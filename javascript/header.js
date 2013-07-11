// Header javascript helpers
$(function(){
	Backbone.emulateHTTP = true;
	Backbone.emulateJSON = true;
	
	var CartProductModel = Backbone.Model.extend({
		url: config.ShopPath,
		
		idAttribute: 'id', 
		
		defaults: function() {
			return {
				thumb: null,
				price: 0,
				name: 0,
				quantity: 0,
				size: null,
				id: 0
			};
		},
		
		initialize: function(opts) {
			this.type = opts.type;
			this.id = opts.id;
			if(typeof opts.sid !== "undefined") {
				this.id = opts.sid;
				this.sid = opts.sid;
				this.url = this.url +  '/' + this.type + '.php?action=rest&id=' + encodeURIComponent(opts.sid);
			} else {
				this.url = this.url +  '/' + this.type + '.php?action=rest&id=' + encodeURIComponent(this.id);
			}
		},
		
		alterQuantity: function(dir) {
			if(dir === "+") {
				quantity = parseInt(this.get('quantity'))+1;
			} else if (dir === "-") {
				quantity = parseInt(this.get('quantity'))-1;
			} else if (!isNaN(parseInt(dir)) && isFinite(dir)) {
				quantity = parseInt(dir);
			}
			
			if(quantity === 0) {
				this.clear();
				return true;
			}
	
			this.save({quantity: quantity});
			window.cart.quickView.recalculate();
			
			return true;
		},
		
		clear: function() {
			window.cart.quickView.recalculate();
			this.destroy();
		}
	});
	
	var CartProductView = Backbone.View.extend({
		tagName: "li",
		
		events: {
			'click .plus' : function() {
								this.model.alterQuantity("+");
							},
			'click .minus' : function() {
								this.model.alterQuantity("-");
							},
			'change .quantity input' : function() {
								this.model.alterQuantity(this.$el.find('.quantity input').val());
							},
			'click .x' : function() {
								this.model.clear();
							}
		},
		
		initialize: function() {
			this.model.bind('all', this.render, this);
			this.model.bind('destroy', this.clear, this);
			this.model.bind('sync', this.changed, this);
		},
		
		template: _.template($('#cartquickitem-template').html()),
		
		render: function() { 
			this.$el.html(this.template(this.model.toJSON()));;
			return this;
		},
		
		incrementQuantity: function() {
			this.model.incrementQuantity();
		},
		
		clear: function() {
			this.remove();
		},
		
		changed: function() {
			if(this.model.type == "sandbox") {
				if(typeof this.model.get('sid') !== "undefined") {
					window.sandbox.deleteBySid(this.model.get('sid'));
				}
				window.sandbox.model.fetch();
			}
		}
	});
	
	var CartProductsCollection = Backbone.Collection.extend({
		model: CartProductModel
	});
	
	window.CartProductTypesCollection = Backbone.Collection.extend({
		model: window.CartProductTypeModel
	});
	
	window.CartProductTypeModel = Backbone.Model.extend({
	});
	
	window.CartProductTypeView = Backbone.View.extend({
		tagName: "li",
		
		template: _.template($('#cartquicktype-template').html()),
		
		initialize: function(opts) {
			this.products = new CartProductsCollection();
			this.products.bind('add', this.addOne, this);
			_.bindAll(this, 'render');
		},
		
		render: function() { 
			this.$el.html(this.template(this.model.toJSON()));
			that = this;
			_.each(this.model.get('products'), function(product) {
				product.type = that.model.get('cartType');
				var product = new CartProductModel(product);
				that.products.add(product);
			});
			
			return this;
		},
		
		addOne: function(product) {
			var view = new CartProductView({model: product});
			this.$el.find('ul').first().append(view.render().el);
		}
	});
	
	window.CartQuickModel = Backbone.Model.extend({
		defaults: function() {
			return {
				numproducts: 0,
				total: 0
			};
		}
	});
	
	var CartQuickView = Backbone.View.extend({
		tagName: "ul",
		
		template: _.template($('#cartquick-template').html()),
		
		initialize: function(opts) {
			this.model = new CartQuickModel(opts);
			
			this.productTypes = new CartProductTypesCollection();
			this.productTypes.bind('add', this.addOne, this);
			this.model.bind('all', this.render, this);
			
			_.bindAll(this, 'render', 'addOne', 'toggle', 'recalculate');
		},
		
		render: function() { 
			this.$el.html(this.template(this.model.toJSON()));
			
			var that = this;
			_.each(this.model.get('types'), function(type) {
				type.cartType = that.model.get('type');
				var productType = new CartProductTypeModel(type);
				that.productTypes.add(productType);
			});
			return this;
		},
		
		addOne: function(type) {
			var view = new CartProductTypeView({model: type});
			this.$el.append(view.render().el);
		},
		
		toggle: function() {
			this.$el.toggle();
		},
		
		recalculate: function(model) {
			var total = 0;
			
			if(typeof model != 'undefined') {
				_.each(model.collection.models, function(product) {
					total += product.get('price') * product.get('quantity');
				});
			} else { total = 0 }
			
			this.model.set({total: total}, {silent: true});
			this.$el.find('span.total').text("$"+total);
		}
	});	
	
	var CartModel = Backbone.Model.extend({
		url: config.ShopPath + '/remote.php?w=' + this.type + 'Data',
	});
	
	var CartView = Backbone.View.extend({
		
		events: {
			'mouseenter': 'toggleQuickCart',
			'mouseleave': 'toggleQuickCart',
		},
		
		initialize: function(opts, type, loc) {
			opts.type = type;
			if(type == "cart") {
				this.setElement($("#cart"), true);
			} else if(type=="sandbox") {
				if(typeof(loc) != 'undefined' && loc=="insandbox") {
					this.setElement($("#dSandbox"), true);	
				} else {
					this.setElement($("#oSandbox"), true);
				}
			}
			this.model = new CartModel(opts);
			this.quickView = new CartQuickView(opts);
			this.$el.append(this.quickView.render().el);
			
			_.bindAll(this, 'fetch', 'load');
		},
		
		fetch: function(model) {
			if(!window.cartfetching) {
				window.cartfetching = true;
				
				this.quickView.remove();
				$("#cartLoading").show();
				
				this.model.fetch({
					success: this.load
				});
			}
		},
		
		load: function(data, response) {
			// Reload the quickview
			this.quickView = new CartQuickView(data.toJSON());
			this.$el.children('ul').remove();
			this.$el.append(this.quickView.render().el);
			
			window.cartfetching = false;
			$("#cartLoading").hide();
		},
		
		update: function() {
			this.model.set(window.sandbox.model.toJSON());
			this.load();
		},
		
		toggleQuickCart: function(recursion) {
			var maxHeight = $(window).height() - 100;
			this.$el.find('> ul').css("max-height", maxHeight + "px");
			this.$el.toggleClass('a');
			this.quickView.toggle();
			var scrollHeight = maxHeight - this.$el.find('> ul').next().find('> li').first().height()-20;
			this.$el.find('> ul > li:nth-child(2)').css("max-height", scrollHeight + "px");
			
			if(this.$el.hasClass('a')) {
				this.model.set({open: true});
			} else {
				this.model.set({open: false});
				$("body").unbind("click");
			}
			
			return false;
		}
	});
	
	var cart = new CartView(cartData, 'cart');
	window.cart = cart;
});

String.prototype.capfirst = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
