// Load the sandbox once the DOM is ready, using `jQuery.ready`:
$(function(){
	var SandboxQuoteItemModel = Backbone.Model.extend({
		defaults: function() {
			return {
				id: 0,
				type: 0,
				name: null,
				quantity: 0,
				price: 0,
				thumb: 0,
				associations: null
			};
		}
	});
	
	var SandboxQuoteItemView = Backbone.View.extend({
		tagName: "li",
		
	//	template: _.template($('#sandboxquoteitem-template').html()),
		
		initialize: function(opts) {
			this.model = new SandboxQuoteItemModel(opts.model.toJSON());
			this.model.bind('change', this.render, this);
			this.model.bind('destroy', this.remove, this);
		},
		
		render: function() { 
			this.$el.html(this.template(this.model.toJSON()));
			
			return this;
		}
	});
	
	var SandboxQuoteItemsCollection = Backbone.Collection.extend({
		model: SandboxQuoteItemModel
	});
	
	var SandboxHeaderView = Backbone.View.extend({
		el: $(".sboxHContainer"),
		
		initialize: function(opts) {
			that = this;
			//_.each(opts.filters, function(filter) {
			//	Filters.add(filter);
			//});
		},
		
		addOne: function(filter) {
			var view = new FilterView({model: filter});
			this.$el.append(view.render().el);
		}
	});
	
	var sandboxSizeChooser = Backbone.View.extend({
		id: 'SboxSizeChoose',
		
		template:_.template($('#sboxsizechoose-template').html()),
		
		events: {
			'click span' : 'callback'
		},
		
		initialize: function(model, callback) {
			this.model = {
				model: model,
				callback: callback
			};
		},
		
		render: function() {
			model = {
				tester: 'Yeah'
			}
			var scroll = $(window).scrollTop();
			$('body').css({overflow:'hidden'});
			this.$el.css({top: scroll.top});
			this.$el.html(this.template(model));
			return this;
		},
		
		callback: function(el) {
			console.log(el);
		}
	});

	var SandboxModel = Backbone.Model.extend({
		url: config.ShopPath + '/remote.php?w=getSandboxData'
	});

	var SandboxView = Backbone.View.extend({
		el: $("#sandbox"),
		
		initialize: function(opts) {
			//this.model = new ShopAppModel(opts);
			
			_.bindAll(this, 'fetch', 'load');
			//this.model.bind('change', this.fetch, this);
			
			// Create the Filter and Populate It
			//this.header = new SandboxHeaderView(opts);
			//this.mods = new SandboxModsView(opts);
		},
		
		fetch: function(model) {
			if(!window.fetching) {
				window.fetching = true;
				
				$("#contentLoading").show();
				
				model.fetch({
					data: {
						type: this.model.get('typeid'),
						size: this.model.get('sizeid'),
						category: this.model.get('catid')
					},
					success: this.load
				});
			}
		},
		load: function(data) {
			Filters.reset();
			
			// Remove old DOM elements
			this.filter.$el.children('div').remove();
			this.products.$el.find('#CategoryBreadcrumb').empty();
			this.products.$el.find('#sboxCats').empty();
			this.products.$el.find('.SortBox').empty();
			
			// Load up the new ones
			that = this;
			// First Filters
			_.each(this.model.get('filters'), function(filter) {
				Filters.add(filter);
			});
			// Now the product view
			this.products = new ProductsView(this.model.toJSON());
			
			window.fetching = false;
			$("#contentLoading").hide();
		},
		
		add: function(opts) {
			defs = {
				product: null,
				context: null,
				callback: null,
				showSucess: null
			};
			$.extend(defs, opts);
			
			if(defs.product.variations.length == 0) {
				defs.product.active_variation = null;
			}
			
			if(typeof defs.product.active_variation != 'undefined') {
				context[defs.callback]();
				$.ajax({
					url: config.ShopPath + "/sandbox.php",
					data: {
						action: 'remoteadd',
						product_id: defs.product.id,
						variation_id: defs.product.active_variation
					},
					success: function(data) {
						data = $.parseJSON(data);
						console.log(data);
						if(showSuccessMessage) {
							alert("Product Added Successfully");
						}
					}
				}); 
			} else {
				var chooseSize = new sandboxSizeChooser();
				$('body').append(chooseSize.render().el);
			}
		}
	});
	
	if(typeof sandboxData != 'undefined') {
		var sandbox = new SandboxView(sandboxData);
		window.sandbox = sandbox;
	} else {
		console.log("No Sandbox Data to Load");
	}
});	
