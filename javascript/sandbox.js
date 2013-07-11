// Load the sandbox once the DOM is ready, using `jQuery.ready`:
$(function(){
	var sandboxSizeChooser = Backbone.View.extend({
		id: 'SboxSizeChoose',
		
		template:_.template($('#sboxsizechoose-template').html()),
		
		events: {
			'click span' : 'callback'
		},
		
		initialize: function(defs) {
			this.model = defs;
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
		
		callback: function(e) {
			var that = this;
			if(e.currentTarget.className == "mini") {
				$.each(this.model.product.variations, function(index, value) {
					if(value.vcoptionids == "30") {
						that.model.product.active_variation = value.combinationid;
					}
				});
			} else if(e.currentTarget.className == "classic") {
				$.each(this.model.product.variations, function(index, value) {
					if(value.vcoptionids == "31") {
						that.model.product.active_variation = value.combinationid;
					}
				});
			}
			this.destroy();
			window.sandbox.add(this.model);
		},
		
		destroy: function() {
			$('body').css({overflow:'auto'});
			this.remove();
		}
	});
	
	var ModView = Backbone.View.extend({
		tagName: 'figure',
		
		className: 'product',
		
		template:_.template($('#sandboxproduct-template').html()),
		
		initialize: function(opts) {
		},
		
		render: function() {
			this.model.set({ imagefilethumb: config.ShopPath + "/product_images/" + this.model.get('imagefilethumb')});
			this.$el.html(this.template(this.model.toJSON()));
			return this;
		},
	});

	var ModModel = Backbone.Model.extend({
		defaults: function() {
			return {
				id: 0,
				faceid: 0,
				imagefilethumb: '',
				prodname: '',
				strapid: 0
			}
		}
	});

	var ModCollection = Backbone.Collection.extend({
		model: ModModel
	});
		
	var ModsModel = Backbone.Model.extend({});
	
	var ModsView = Backbone.View.extend({
		id: 'sboxMods',
		
		template:_.template($('#sandboxproducts-template').html()),
		
		initialize: function(opts) {
			this.model = new ModsModel(opts);
			
			this.Mods = new ModCollection();
			this.Mods.bind('add', this.addOne, this);
			this.Mods.bind('all', this.render, this);
			
			this.$el.html(this.template(this.model.toJSON()));
			
			var that = this;
			$.each(this.model.get('mods'), function(index, mod) {
				that.Mods.add(mod);
			});
		},
		
		render: function() {
			return this;
		},
		
		addOne: function(mod) {
			var view = new ModView({model: mod});
			this.$el.prepend(view.render().$el);
		}
	});

	var SandboxModel = Backbone.Model.extend({
		url: config.ShopPath + '/remote.php?w=getSandboxData'
	});

	var SandboxView = Backbone.View.extend({
		el: $("#sandbox"),
		
		template:_.template($('#sandbox-template').html()),
		
		events: {
			'click .collapse': 'close'
		},
		
		initialize: function(opts) {
			console.log(opts);
			opts.open = false;
			this.model = new SandboxModel(opts);
			
			_.bindAll(this, 'fetch', 'load');
			this.model.bind('change', this.render, this);
			
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
		},
		
		add: function(opts) {
			defs = {
				product: null,
				context: null,
				callback: null,
				showSuccess: null
			};
			$.extend(defs, opts);
			
			if(defs.product.variations.length == 0) {
				defs.product.active_variation = null;
			}
			
			if(typeof defs.product.active_variation != 'undefined') {
				var that = this;
				defs.context[defs.callback]();
				$.ajax({
					url: config.ShopPath + "/sandbox.php",
					data: {
						action: 'remoteadd',
						product_id: defs.product.id,
						variation_id: defs.product.active_variation
					},
					success: function(data) {
						data = $.parseJSON(data);
						data.products.open = false;
						data.products.type = "sandbox";
						that.model.set(data.products);
					}
				}); 
			} else {
				var chooseSize = new sandboxSizeChooser(defs);
				$('body').append(chooseSize.render().el);
			}
		},
		
		show: function() {
			this.model.set({open: true, scroll: $(window).scrollTop()});
			$('#header').addClass('mini');
			$('body').append(this.render().$el);
			this.$el.fadeIn(1000, function() {
				$("html, body").scrollTop(0);
				$("body").addClass("theater");
			});
		},
		
		close: function() {
			var scroll = this.model.get('scroll');
			var that = this;
			$("body").removeClass("theater");
			$("html, body").scrollTop(scroll);
			$("#header").removeClass('mini');
			this.$el.fadeOut( 500, function() {
				that.model.set({open: false});
				$("html, body").scrollTop(scroll);
				$(window).trigger('scroll');
				$('body').remove('#sandbox');
			});
		},
		
		render: function() {
			console.log(this.model.toJSON());
			// Render the template
			this.$el.html(this.template(this.model.toJSON()));
			// Populate the mods
			this.mods = new ModsView(this.model.toJSON());
			this.$el.children('.opened').append(this.mods.render().$el);
			// Add the quickcart view
			this.quote = new QuoteView(this.model.toJSON());
			this.$el.children('.bq').after(this.quote.render().$el);	
			return this;
		}
	});
	
	if(typeof sandboxData != 'undefined') {
		var sandbox = new SandboxView(sandboxData);
		window.sandbox = sandbox;
	} else {
		console.log("No Sandbox Data to Load");
	}
	
	var sandboxDropQuote = new window.CartView(sandboxQuoteData, 'sandbox', 'insandbox');
	window.sandboxDropQuote = sandboxDropQuote;
});	
