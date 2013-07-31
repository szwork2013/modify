$(function () {
	window.currState = 1;
	window.clearVertHeight = 55;
	
	// Prepare
    var History = window.History;

    // Bind to StateChange Event
    History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
        var State = History.getState(); // Note: We are using History.getState() instead of event.state
        if(State.title === "") {
			shopApp.model.set({
				catid: "/",
				sizeid: "false",
				typeid: "false",
				colid: 'false'
			});
        } else if(State.data.currState < window.currState) {
			shopApp.model.set(State.data);
		}
		window.currState = State.data.currState;
    });
	
	
	var ProductHeaderModel = Backbone.Model.extend({
		defaults: function() {
			return {
				name: '',
				description: ''
			};
		}
	});
	
	var ProductHeaderView = Backbone.View.extend({
		id: 'CategoryHeading',
		
		template:_.template($('#categoryheader-template').html()),
		
		events: {
			'click' : function() {}
		},
		
		initialize: function(opts) {
			this.model = new ProductHeaderModel(opts);
		},
		
		render: function() {
			this.$el.html(this.template(this.model.toJSON()));
			return this;
		}
	});
	
	var ProductModel = Backbone.Model.extend({
		defaults: function() {
			return {
				id: 0,
				image: '',
				name: '',
				price: '',
				rating: 0
			};
		}
	});
	
	var ProductView = Backbone.View.extend({
		tagName: 'figure',
		
		className: 'product',
		
		template:_.template($('#product-template').html()),
		
		events: {
			'click img': "addToSandbox",
			'click .visualize': "addToSandbox",
			'click .buyNow' : "buyNow"
		},
		
		render: function() {
			this.$el.html(this.template(this.model.toJSON()));
			return this;
		},
		
		addToSandbox: function() {
			console.log("btn addToSandbox");
			if(	typeof shopApp !== 'undefined' && shopApp.model.get('sizeid') !== false) {
				var that = this;
				$.each(this.model.get('variations'), function(index, value) {
					if(value.vcoptionids == shopApp.model.get('sizeid')) {
						that.model.set('active_variation', value.combinationid);
					}
				});
			} else {
				this.model.unset('active_variation');
			}
			window.sandbox.add({
				product: this.model.toJSON(),
				context: this, 
				callback: 'jumpToSandbox',
				showSuccess: true
			});
			return false;
		},

		buyNow: function() {
			console.log("btn buyNow");
			if(	typeof shopApp !== 'undefined' && shopApp.model.get('sizeid') !== false) {
				var that = this;
				$.each(this.model.get('variations'), function(index, value) {
					if(value.vcoptionids == shopApp.model.get('sizeid')) {
						that.model.set('active_variation', value.combinationid);
					}
				});
			} else {
				this.model.unset('active_variation');
			}
			window.sandbox.buyNow({
				product: this.model.toJSON(),
				context: this, 
				callback: 'redirectToCart',
				showSuccess: true
			});
			return false;
		},

		// jQuery visualization to add to Cart

		jumpToSandbox: function() {
			this.$("a > img").jumpTo({
				destination: "#sboxPreview header"
			});
			this.pulseIt();
		},

		redirectToCart: function() {
		},
		
		pulseIt: function() {
			$('#sboxPreview').fadeOut(300, function() { $('#sboxPreview').fadeIn(); });
		}
	});
	
	var ProductCollection = Backbone.Collection.extend({
		model: ProductModel,
		
		nextOrder: function() {
		  if (!this.length) {
			  return 1;
		  }
		  if (this.last().get('order') == 3) {
			  return 1;
		  }
		  return this.last().get('order') + 1;
		}
	});


	// ****** CATEGORY ******* //
	
	var CategoryModel = Backbone.Model.extend({
		defaults: function() {
			return {
				description: '',
				name: '',
				page: 1
			};
		}
	});
	
	var CategoryView = Backbone.View.extend({
		initialize: function(opts) {

			this.model = new CategoryModel(opts.model);
			var header = new ProductHeaderView(this.model.toJSON());
			this.$el.append(header.render().el);
			
			this.Products = new ProductCollection();
			this.Products.bind('add', this.addOne, this);
			this.Products.bind('all', this.render, this);
			_.bindAll(this, 'scrolling', 'appender');

			that = this;
			_.each(this.model.get('products'), function(product) {
				product.order = that.Products.nextOrder();
				that.Products.add(product);
			});
						
			this.scrolling();
						
			this.$el.append('<br class="Clear" />');
		},
		
		addOne: function(product) {
			var view = new ProductView({model: product});
			if(this.loading) {
				$("#myCarousel > div").last().append(view.render().el);
			} else {
				this.$el.append(view.render().el);
			}	
		},
		
		scrolling: function() {
			this.keepLoading = true;
			var that = this;
			// var origSideOffset = $("#sboxSide").offset().top;
			// var origVisOffset = $("#sboxPreview").offset();
			// var origVisWidth = $("#sboxPreview").width();
		
			// $(window).scroll(function() {
			// 	// Infinite scroll
			// 	if(($("#sboxMain").height() + $("#sboxMain").offset().top) - ($(window).scrollTop() + $(window).height()) < 80 && !that.loading && that.model.get('products').length > 15 && !window.sandbox.model.get('open')) {
			// 		page = parseInt(that.model.get('page'), 10) + 1;
					
			// 		that.loading = true;
					$.ajax({
						url: config.ShopPath + "/remote.php",
						data: {
							w: 'getShopPage',
							page: 1,
							type: false,
							size: false,
							color: undefined,
							category: 'Best%252dSellers'
						},
						success: function(data) {
							that.model.set('page', 2);
							data = $.parseJSON(data);
							console.log("Success!");
							console.log(data);
							that.appender(data);
							that.loading = false;
						},
						error: function(data) {
							console.log(data['category']);
							new genericModal({
								message: 'Well this is embarrassing . We\'re not sure what happened... <br />We suggest refreshing the page :)'
							});
						}
					});
				// }
				
				// Lock Filters
				// if($(window).scrollTop() >= (origSideOffset - 50)) {
				// 	$("#sboxSide").addClass('fxTop');
				// } else {
				// 	$("#sboxSide").removeClass('fxTop');
				// }
				
				// if(origVisOffset.left < 0 && !$("#sboxPreview").hasClass('fxTop')) {
				// 	origVisOffset = $("#sboxPreview").offset();
				// }
				// if($(window).scrollTop() >= (origVisOffset.top - 50)) {
				// 	$("#sboxPreview").addClass('fxTop').css({ left: (origVisOffset.left) + "px", right: 'auto', width: origVisWidth + "px" });
				// } else {
				// 	$("#sboxPreview").removeClass('fxTop').css({ left: 'auto', right: 0 });
				// }
			// });
		},
		
		appender: function(products) {
			that = this;
			_.each(products, function(product) {
				that.Products.add(product);
			});
		}
	});
	
	var CategoriesModel = Backbone.Model.extend({
		defaults: function() {
			return {
				description: '',
				name: ''
			};
		}
	});
	
	var CategoryCollection = Backbone.Collection.extend({
		model: CategoriesModel
	});
	
	var CategoriesView = Backbone.View.extend({
		el: $("#sboxCats"),
		
		initialize: function(opts) {
			this.Categories = new CategoryCollection();
			this.Categories.bind('add', this.addOne, this);
			this.Categories.bind('all', this.render, this);

			that = this;
			_.each(opts.categories, function(category) {
				that.Categories.add(category);
			});
		},
		
		addOne: function(category) {
			var view = new CategoryView({model: category.toJSON()});
			this.$el.append(view.render().el);
		}
	});
	
	
	var SortBoxOptionModel = Backbone.Model.extend({
		defaults: function() {
			return {
				name: '',
				selected: false,
				value: ''
			};
		}
	});
	
	var SortBoxOptionView = Backbone.View.extend({
		tagName: 'option',
		
		template:_.template($('#sortoption-template').html()),
		
		events: {
			'click' : function() {}
		},
		
		initialize: function(opts) {
			this.$el.attr("value", this.model.get("value"));
			if(this.model.get("active")== true) { 
				this.$el.attr("selected", "selected");
			}
		},
		
		render: function() {
			this.$el.html(this.template(this.model.toJSON()));
			return this;
		}
	});
	
	var SortBoxModel = Backbone.Model.extend({
		defaults: function() {
			return {
				formaction: '',
				label: ''
			};
		}
	});
	
	var SortBoxCollection = Backbone.Collection.extend({
		model: SortBoxModel
	});
	
	var SortBoxView = Backbone.View.extend({
		el: $(".SortBox"),
		
		template:_.template($('#sortbox-template').html()),
		
		initialize: function(opts) {
			this.model = new SortBoxModel(opts);
			this.$el.append(this.template(this.model.toJSON()));
			this.$el = this.$el.find("select").last();
	
			this.SortBoxOptions = new SortBoxCollection();
			this.SortBoxOptions.bind('add', this.addOne, this);
			this.SortBoxOptions.bind('reset', this.addAll, this);
			this.SortBoxOptions.bind('all', this.render, this);

			that = this;
			_.each(opts.options, function(sortboxoption) {
				that.SortBoxOptions.add(sortboxoption);
			});
		},
		
		addOne: function(sortboxoption) {
			var view = new SortBoxOptionView({model: sortboxoption});
			this.$el.append(view.render().el);
		}
	});
	
	var BreadcrumbModel = Backbone.Model.extend({
		defaults: function() {
			return {
				active: false,
				name: ''
			};
		}
	});
	
	var BreadcrumbView = Backbone.View.extend({
		tagName: 'li',
		
		template:_.template($('#breadcrumb-template').html()),
		
		events: {
			'click' : function() {}
		},
		
		initialize: function(opts) {
			
		},
		
		render: function() {
			this.$el.html(this.template(this.model.toJSON()));
			return this;
		}
	});
	
	var BreadcrumbCollection = Backbone.Collection.extend({
		model: BreadcrumbModel
	});
	
	var BreadcrumbsView = Backbone.View.extend({
		el: $("#CategoryBreadcrumb"),
		
		initialize: function(opts) {
			this.$el.append('<ul><li><a href="http://www.modifywatches.com/">Home</a></li></ul>');
			this.$el = this.$el.children("ul").last();
			
			this.Breadcrumbs = new BreadcrumbCollection();
			this.Breadcrumbs.bind('add', this.addOne, this);
			this.Breadcrumbs.bind('reset', this.addAll, this);
			this.Breadcrumbs.bind('all', this.render, this);

			that = this;
			_.each(opts, function(breadcrumb) {
				that.Breadcrumbs.add(breadcrumb);
			});
		},
		
		addOne: function(breadcrumb) {
			var view = new BreadcrumbView({model: breadcrumb});
			this.$el.append(view.render().el);
		}
	});
	
	var ProductsView = Backbone.View.extend({
		el: $("#sboxMain"),
		
		initialize: function(opts) {
			this.breadcrumbs = new BreadcrumbsView(opts.breadcrumbs);
			this.sortbox = new SortBoxView(opts.sortbox);
			this.categories = new CategoriesView(opts.productdisplay);
		}
	});
	
	var OptionModel = Backbone.Model.extend({
		defaults: function() {
			return {
				class_: '',
				extrastyle: '',
				id: 0,
				name: '',
				title: ''
			};
		}
	});
	
	var OptionCollection = Backbone.Collection.extend({
		model: OptionModel
	});
	
	var SelectorModel = Backbone.Model.extend({
		defaults: function() {
			return {
				class_: '',
				id: ''
			};
		}
	});
	
	var OptionView = Backbone.View.extend({
		tagName: 'li',
		
		template:_.template($('#option-template').html()),
		
		events: {
			'click' : 'update'
		},
		
		initialize: function(opts) {
			this.$el.attr('title', this.model.get('title')).addClass(this.model.get('class_'));
			_.bindAll(this, 'render', 'update');
			
			if(this.model.get('extrastyles') !== '') {
				this.$el.attr('style', this.model.get('extrastyles'));
			}
		},
		
		render: function() {
			this.$el.html(this.template(this.model.toJSON()));
			
			if(this.$el.hasClass('a') && typeof this.model.get('subcats') != "undefined") {
				var that = this;
				this.fixCats = new Array();
				
				_.each(this.model.get('subcats'), function(subcat) {
					className = subcat.class_;
					that.fixCats.push({
						class_: className,
						extraStyles: '',
						id: subcat.id,
						link: subcat.link,
						name: subcat.name,
						title: '',
						type: 'subcatid'
					});
				});
				if(this.fixCats.length) {
					this.model.set('subcategory', {
						class_: 'subcats',
						id: '',
						options: this.fixCats
					})
					delete this.fixCats;
					
					this.subcats = new SelectorView({model: this.model.get('subcategory')});
					this.$el.append(this.subcats.render().el);
				}
			}
			
			return this;
		},
		
		update: function() {
			var type = this.model.get('type');
			var id = this.model.get('id');
			
			switch(type) {
				case "typeid":
					if(shopApp.model.get('typeid') == id) {
						shopApp.model.set({typeid: 0});
					} else {
						shopApp.model.set({typeid: id});
					}
					break;
				case "sizeid":
					if(shopApp.model.get('sizeid') == id) {
						shopApp.model.set({sizeid: 0});
					} else {
						shopApp.model.set({sizeid: id});
					}
					break;
				case "catid":
					if(shopApp.model.get('catid') == id) {
						shopApp.model.set({catid: 0});
					} else {
						shopApp.model.set({catid: id});
					}
					break;
				case "subcatid":
					if(shopApp.model.get('catid') == id) {
						shopApp.model.set({catid: 0});
					} else {
						shopApp.model.set({catid: id});
					}
					break;
				case "colid":
					if(shopApp.model.get('colid') == id) {
						shopApp.model.set({colid: 0});
					} else {
						shopApp.model.set({colid: id});
					}
					break;
			}
		
			return false;
		}
	});
	
	var SelectorView = Backbone.View.extend({
		tagName: 'ul',
		
		template: _.template($('#selector-template').html()),
		
		initialize: function(opts) {
			this.model = new SelectorModel(opts.model);
			this.model.bind('change', this.render, this);
			this.model.bind('destroy', this.remove, this);
			this.$el.attr('id', this.model.get('id')).addClass(this.model.get('class_'));
			
			this.options = new OptionCollection();
			this.options.bind('add', this.addOne, this);
			this.options.bind('reset', this.addAll, this);
			this.options.bind('all', this.render, this);
		},
		
		render: function() {
			var that = this;
			_.each(this.model.get('options'), function(option) {
				that.options.add(option);
			});
			return this;
		},
		
		addOne: function(option) {
			var view = new OptionView({model: option});
			var html = view.render().el;
			if(this.model.get('id') == "filtCat" && view.$el.hasClass('a') ) {
				this.$el.prepend(html);
			} else {
				this.$el.append(html);
			}
		}
	});
	
	var FilterModel = Backbone.Model.extend({
		defaults: function() {
			return {
				filttype: null,
				multiselection: false,
				title: null
			};
		}
	});
	
	var FilterView = Backbone.View.extend({
		tagName: "div",
		
		className: 'filter',
		
		template: _.template($('#filter-template').html()),
		
		initialize: function(opts) {
			this.model = new FilterModel(opts.model.toJSON());
			this.model.bind('change', this.render, this);
			this.model.bind('destroy', this.remove, this);
		},
		
		render: function() { 
			this.$el.html(this.template(this.model.toJSON()));
			this.selector = new SelectorView({model: this.model.get('selector')});
			this.$el.append(this.selector.render().el);
			
			return this;
		}
	});
	
	var FilterCollection = Backbone.Collection.extend({
		model: FilterModel
	});
	
	var Filters = new FilterCollection();
	
	var FiltersView = Backbone.View.extend({
		el: $("#sboxFilter"),
		
		initialize: function(opts) {
			Filters.bind('add', this.addOne, this);
			Filters.bind('all', this.render, this);

			var that = this;
			_.each(opts.filters, function(filter) {
				Filters.add(filter);
			});
		},
		
		addOne: function(filter) {
			var view = new FilterView({model: filter});
			this.$el.append(view.render().el);
		}
	});

	var ShopAppModel = Backbone.Model.extend({
		url: config.ShopPath + '/remote.php?w=getShopData',
		
		defaults: function() {
			return {
				catid: 0,
				typeid: 0,
				sizeid: 0,
				colorid: 0
			};
		}
	});
	
	var SandboxWalkthroughModel = Backbone.Model.extend({
		defaults: function() {
			return {
				stepNum: 0,
				instructions: '',
				cta: '',
				render: 0
			};
		}
	});
	
	var SandboxWalkthroughItem = Backbone.View.extend({
		template: _.template($('#walkthrough-template').html()),
		
		events: {
			'click' : 'activate'
		},
		
		initialize: function(opts) {
			this.model = opts.model;
		},
		
		render: function() {
			this.$el.html(this.template(this.model.toJSON()));
			return this;
		},
		
		activate: function() {
			$('.whiteOverlay').fadeOut(300, function() { 
				$('.whiteOverlay').remove(); 
				$("#sboxTutorial").css('position', '');
			});
			this[this.model.get('func')]();
		},
		
		showStep1: function() {
			var curMod = window.shopApp.model.toJSON();
			curMod.typeid = "1";
			window.shopApp.model.set(curMod);
		},
		
		showStep2: function() {
			var curMod = window.shopApp.model.toJSON();
			curMod.typeid = "2";
			window.shopApp.model.set(curMod);
		},
		
		showStep3: function() {
			window.sandbox.show();
		}
	});
	
	var SandboxWalkthroughCollection = Backbone.Collection.extend({});
	
	window.SandboxWalkthrough = Backbone.View.extend({
		id: 'sboxTutorial',
		
		initialize: function(opts) {
			if(opts.render == 1) {
				this.opts = opts;
				
				$(".gradBG").css("margin-bottom", "0px");
				this.model = new SandboxWalkthroughModel(opts);
			//	_.bindAll(this, 'render', 'showStep1', 'showStep2');
				this.collection = new SandboxWalkthroughCollection();
				this.collection.bind('add', this.addOne, this);
				
				this.render();
				
				window.clearVertHeight = 120;
			}
		},
		
		addOne: function(item) {
			var view = new SandboxWalkthroughItem({model: item});
			this.$el.append(view.render().el);
		},
		
		render: function() {
			var that = this;
			_.each(this.model.get('steps'), function(step) {
				that.collection.add(step);
			});
			
			$("#main").prepend(this.$el);
		}
	});

	var ShopAppView = Backbone.View.extend({
		el: $("#main"),
		
		initialize: function(opts) {
			shopModel = {
				catid: opts.catid,
				typeid: opts.typeid,
				sizeid: opts.sizeid,
				action: opts.action
			}
			
			this.model = new ShopAppModel(shopModel);
			
			_.bindAll(this, 'fetch', 'load');
			this.model.bind('change', this.fetch, this);
			
			// Create the Filter and Populate It
			this.filter = new FiltersView(opts);
			this.products = new ProductsView(opts);
			
			$(".viewProdInfo").fancybox({
				'width': 790,
				'height': 500,
				'autoDimensions': false
			});
		},
		
		fetch: function(model) {
			if(!window.fetching) {
				window.fetching = true;
				
				$("#contentLoading").show();
				
				model.fetch({
					data: {
						type: this.model.get('typeid'),
						size: this.model.get('sizeid'),
						color: this.model.get('colid'),
						category: (this.model.get('catid') == false ? '' : this.model.get('catid')),
						a: this.model.get('action')
					},
					success: this.load,
					error: this.loadFail
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
			
			this.setHistory();
			
			window.fetching = false;
			$("#contentLoading").hide();
			
			$(".viewProdInfo").fancybox({
				'width': 790,
				'height': 500,
				'autoDimensions': false
			});
		},
		
		setHistory: function() {
			window.currState++;
			stateURL = "/categories/";
			if(this.model.get('catid') !== "false" && this.model.get('catid') !== false) {
				stateURL = stateURL + this.model.get('catid');
			}
			stateURL = stateURL + "?";
			if(this.model.get('sizeid') !== "false" && this.model.get('sizeid') !== false) {
				stateURL = stateURL + "size=" + this.model.get('sizeid') + "&";
			}
			if(this.model.get('typeid') !== "false" && this.model.get('typeid') !== false) {
				stateURL = stateURL + "type=" + this.model.get('typeid') + "&";
			}
			if(this.model.get('colid') !== "false" && this.model.get('colid') !== "undefined" && this.model.get('colid') !== false) {
				stateURL = stateURL + "color=" + this.model.get('colid') + "&";
			}
			stateURL = stateURL + "a=" + this.model.get('action');
			History.pushState({
				currState: window.currState,
				catid:this.model.get('catid'),
				sizeid:this.model.get('sizeid'),
				typeid:this.model.get('typeid'),
				colid:this.model.get('colid'),
				action:this.model.get('action')
			}, "Create Your Collection - Modify Watches", stateURL);
		},
		
		loadFail: function(data) {
			window.fetching = false;
			$("#contentLoading").hide();
			
			new genericModal({ 
				message: 'Well this is embarrassing . We\'re not sure what happened... <br />We suggest refreshing the page :)'
			});

		}
	});
	
	window.updateShopSandbox = function() {
		$("#sboxPreview > div > div").empty().append('<br class="Clear" />');
		var numMods = 0;
		$.each(this.model.get('mods'), function() {
			numMods++;
			if(numMods < 7) {
				if(this.size == "Mini") {
					$("#sboxPreview > div > div.mini").prepend(_.template($('#sandboxpreview-template').html(),this));
				} else if(this.size == "Classic") {
					$("#sboxPreview > div > div.classic").prepend(_.template($('#sandboxpreview-template').html(),this));
				}
			} else {
				$('#plusmore').remove();
				$("#sboxPreview > div").append("<div id='plusmore'>+" + (numMods - 8) + " More! Hover to see all!</div>");
			}
		});
		
		var products = {
			Mini: {
				faces: new Array(), 
				straps: new Array()
			},
			Classic: {
				faces: new Array(), 
				straps: new Array()
			}
		};
		
		$.each(this.model.get('products'), function() {
			if(this.phystype == 1) { 
				products[this.size.Size].faces.push(parseInt(this.id));
			} else if(this.phystype == 2) { 
				products[this.size.Size].straps.push(parseInt(this.id)); 
			} else if(this.phystype == 3) {
				var that = this;
				$.each(this.associations, function() {
					if(this.prodphystype == 1) {
						products[that.size.Size].faces.push(parseInt(this.productid));
					} else if(this.prodphystype == 2) {
						products[that.size.Size].straps.push(parseInt(this.productid));
					}
				});
			}
		});
		
		products.Mini.faces = products.Mini.faces.getUnique();
		products.Classic.faces = products.Classic.faces.getUnique();
		products.Mini.straps = products.Mini.straps.getUnique();
		products.Classic.straps = products.Classic.straps.getUnique();
		
		$("#miniFaceCounter").html(products.Mini.faces.length);
		$("#miniStrapCounter").html(products.Mini.straps.length);
		$("#miniModCounter").html(products.Mini.faces.length*products.Mini.straps.length);
		
		$("#classicFaceCounter").html(products.Classic.faces.length);
		$("#classicStrapCounter").html(products.Classic.straps.length);
		$("#classicModCounter").html(products.Classic.faces.length * products.Classic.straps.length);
		
		// messages
		if(products.Classic.faces.length >= 1 || products.Classic.straps.length >= 1) {
			$("#sboxPreview > div > .classic").fadeIn();
		}
		if(products.Classic.faces.length >= 1 && products.Classic.straps.length == 0) {
			$("#sboxPreview > div > div.classic").prepend("<span>Add a strap to see the power of the visualizer :)</span>");
		} else if(products.Classic.faces.length == 0 && products.Classic.straps.length >= 1) {
			$("#sboxPreview > div > div.classic").prepend("<span>Add a face to see the power of the visualizer :)</span>");
		} else if(products.Classic.faces.length == 0 && products.Classic.straps.length == 0) {
			$("#sboxPreview > div > .classic").fadeOut();
		}
		
		if(products.Mini.faces.length >= 1 || products.Mini.straps.length >= 1) {
			$("#sboxPreview > div > .mini").fadeIn();
		}
		if(products.Mini.faces.length >= 1 && products.Mini.straps.length == 0) {
			$("#sboxPreview > div > div.mini").prepend("<span>Add a strap to see the power of the visualizer :)</span>");
		} else if(products.Mini.faces.length == 0 && products.Mini.straps.length >= 1) {
			$("#sboxPreview > div > div.mini").prepend("<span>Add a face to see the power of the visualizer :)</span>");
		} else if(products.Mini.faces.length == 0 && products.Mini.straps.length == 0) {
			$("#sboxPreview > div > .mini").fadeOut();
		}
		
		if(products.Classic.faces.length == 0 && products.Classic.straps.length == 0 &&
			products.Mini.faces.length == 0 && products.Mini.straps.length == 0) {
			$('.explain').fadeIn();
		} else {
			$('#visCTA').fadeIn();
			$('.explain').fadeOut();
		}
	};

	var shopApp = new ShopAppView(buildData);
	window.shopApp = shopApp;
	
	$('#sboxPreview').click(function() {
		window.sandbox.show();
	});
	
	// This needs to be seriously refactored and abstracted
	if(typeof sandboxData != 'undefined') {
		var numMods = 0;
		
		$.each(sandboxData.mods, function() {
			numMods++;
			if(numMods < 7) {
				if(this.size == "Mini") {
					$("#sboxPreview > div > div.mini").prepend(_.template($('#sandboxpreview-template').html(),this));
				} else if(this.size == "Classic") {
					$("#sboxPreview > div > div.classic").prepend(_.template($('#sandboxpreview-template').html(),this));
				}
			} else {
				$('#plusmore').remove();
				$("#sboxPreview > div").append("<div id='plusmore'>+" + (numMods - 8) + " More! Hover to see all!</div>");
			}
		});
		var products = {
			Mini: {
				faces: new Array(), 
				straps: new Array()
			},
			Classic: {
				faces: new Array(), 
				straps: new Array()
			}
		};
		
		$.each(sandboxData.products, function() {
			if(this.phystype == 1) { 
				products[this.size.Size].faces.push(parseInt(this.id));
			} else if(this.phystype == 2) { 
				products[this.size.Size].straps.push(parseInt(this.id)); 
			} else if(this.phystype == 3) {
				var that = this;
				$.each(this.associations, function() {
					if(this.prodphystype == 1) {
						products[that.size.Size].faces.push(parseInt(this.productid));
					} else if(this.prodphystype == 2) {
						products[that.size.Size].straps.push(parseInt(this.productid));
					}
				});
			}
		});
		
		products.Mini.faces = products.Mini.faces.getUnique();
		products.Classic.faces = products.Classic.faces.getUnique();
		products.Mini.straps = products.Mini.straps.getUnique();
		products.Classic.straps = products.Classic.straps.getUnique();
		
		$("#miniFaceCounter").html(products.Mini.faces.length);
		$("#miniStrapCounter").html(products.Mini.straps.length);
		$("#miniModCounter").html(products.Mini.faces.length*products.Mini.straps.length);
		
		$("#classicFaceCounter").html(products.Classic.faces.length);
		$("#classicStrapCounter").html(products.Classic.straps.length);
		$("#classicModCounter").html(products.Classic.faces.length * products.Classic.straps.length);
		
		// messages
		if(products.Classic.faces.length >= 1 || products.Classic.straps.length >= 1) {
			$("#sboxPreview > div > .classic").fadeIn();
		}
		if(products.Classic.faces.length >= 1 && products.Classic.straps.length == 0) {
			$("#sboxPreview > div > div.classic").prepend("<span>Add a strap to see the power of the visualizer :)</span>");
		} else if(products.Classic.faces.length == 0 && products.Classic.straps.length >= 1) {
			$("#sboxPreview > div > div.classic").prepend("<span>Add a face to see the power of the visualizer :)</span>");
		} else if(products.Classic.faces.length == 0 && products.Classic.straps.length == 0) {
			$("#sboxPreview > div > .classic").fadeOut();
		}
		
		if(products.Mini.faces.length >= 1 || products.Mini.straps.length >= 1) {
			$("#sboxPreview > div > .mini").fadeIn();
		}
		if(products.Mini.faces.length >= 1 && products.Mini.straps.length == 0) {
			$("#sboxPreview > div > div.mini").prepend("<span>Add a strap to see the power of the visualizer :)</span>");
		} else if(products.Mini.faces.length == 0 && products.Mini.straps.length >= 1) {
			$("#sboxPreview > div > div.mini").prepend("<span>Add a face to see the power of the visualizer :)</span>");
		} else if(products.Mini.faces.length == 0 && products.Mini.straps.length == 0) {
			$("#sboxPreview > div > .mini").fadeOut();
		}
		
		if(products.Classic.faces.length == 0 && products.Classic.straps.length == 0 &&
			products.Mini.faces.length == 0 && products.Mini.straps.length == 0) {
			$('.explain').fadeIn();
		} else {
			$("#visCTA").fadeIn()
			$('.explain').fadeOut();
		}
		
		$('#sboxPreview').hover(function() {
			window.clearTimeout(window.closeTimeout);
			window.openTimeout = setTimeout(function() {
				window.sandbox.show();
			}, 800);
		}, function() {
			window.clearTimeout(window.openTimeout);
		});
	}
	
	
	
	/////////////// ENTER SANDBOX
	
	var SandboxContentsModel = Backbone.Model.extend({
		defaults: function() {
			return {
				numproducts: 10,
				total: 0
			};
		}
	});
	
	var SandboxContentsView = Backbone.View.extend({
		tagName: "ul",
		
		template: _.template($('#sandquick-template').html()),
		
		initialize: function(opts) {
			this.model = new CartQuickModel({products: opts});
			this.model.set({numproducts: 0, type: 'sandbox', total: 0});
			var types = {
				faces: {
					title: 'Faces',
					products: new Array()
				},
				straps: {
					title: 'Straps',
					products: new Array()
				},
				mods: {
					title: 'Mods',
					products: new Array()
				},
				sets: {
					title: 'Sets',
					products: new Array()
				}
			};
			var that = this;
			$.each(this.model.get('products'), function(i, product) {
				if(product.phystype == 1) {
					types.faces.products.push(product);
				} else if(product.phystype == 2) {
					types.straps.products.push(product);
				} else if(product.phystype == 3) {
					types.mods.products.push(product);
				} else if(product.phystype == 4) {
					types.sets.products.push(product);
				}
				total = that.model.get('total') + (product.price * product.quantity);
				numprods = that.model.get('numproducts') + 1;
				that.model.set({total: total, numproducts: numprods });
			});
			$.each(types, function(i, type) {
				if(type.products.length === 0) {
					delete types[type.title.toLowerCase()];
				}
			});
			this.types = types;
			
			this.productTypes = new CartProductTypesCollection();
			this.productTypes.bind('add', this.addOne, this);
			this.model.bind('all', this.render, this);
			
			_.bindAll(this, 'render', 'addOne');
		},
		
		render: function() { 
			this.model.set('type', 'sandbox');
			this.$el.html(this.template(this.model.toJSON()));
			
			var that = this;
			$.each(this.types, function(key, type) {
				type.cartType = that.model.get('type');
				var productType = new CartProductTypeModel(type);
				that.productTypes.add(productType);
			});
			return this;
		},
		
		addOne: function(type) {
			var view = new CartProductTypeView({model: type});
			this.$el.append(view.render().el);
		}
	});
	
	var genericModalModel = new Backbone.Model.extend({});
	
	window.genericModal = Backbone.View.extend({
		template:_.template($('#genericmodal-template').html()),
		
		className: 'genModal',
		
		events: {
			'click .close': 'destroy'
		},
		
		initialize: function(defs) {
			_.bindAll(this, 'render', 'destroy', 'binder');
			this.model = defs;
			$('body').append(this.render().el);
		},
		
		render: function() {
			if(typeof this.model.message != "undefined") {
				var scroll = $(window).scrollTop();
				$('body').css({overflow:'hidden'});
				this.$el.css({top: scroll.top});
				this.$el.html(this.template(this.model));
				return this;
			} else {
				return false;
			}
		},
		
		destroy: function() {
			var that = this;
			this.$el.fadeOut(200, function() {
				$('body').css({overflow:'auto'});
				that.remove();
			});
		},
		
		binder: function(event, callback) {
			var specs = event.split(" ");
			var that = this;
			$(specs[1], this.el).bind(specs[0], function() {
				that[callback]();
			});
		}
	});
	
	var sandboxSizeChooser = Backbone.View.extend({
		id: 'SboxSizeChoose',
		
		template:_.template($('#sboxsizechoose-template').html()),
		
		events: {
			'click span' : 'callback',
			'click .close': 'destroy'
		},
		
		initialize: function(defs, buyNow) {
			_.bindAll(this, 'render', 'destroy', 'callback');
			this.model = defs;
			this.buyNow = buyNow;
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
			if(e.currentTarget.className == "mini ctaBut") {
				$.each(this.model.product.variations, function(index, value) {
					if(value.vcoptionids == "30") {
						that.model.product.active_variation = value.combinationid;
						if(typeof window.shopApp !== "undefined") {
							window.shopApp.model.set({
								sizeid: 30
							});
						}
					}
				});
			} else if(e.currentTarget.className == "classic ctaBut") {
				$.each(this.model.product.variations, function(index, value) {
					if(value.vcoptionids == "31") {
						that.model.product.active_variation = value.combinationid;
						if(typeof window.shopApp !== "undefined") {
							window.shopApp.model.set({
								sizeid: 31
							});
						}
					}
				});
			}
			this.destroy();


			if(this.buyNow) {
				window.sandbox.buyNow(this.model);
			} else {
				window.sandbox.add(this.model);				
			}
		},
		
		destroy: function() {
			var that = this;
			this.$el.fadeOut(200, function() {
				$('body').css({overflow:'auto'});
				that.remove();
			});
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
			
			if(this.Mods.length > 0) {
				this.$el.find("#hideMods").show();
				if(this.Mods.where({size: 'Classic'}).length > 0) {
					this.$el.find("#classicMods").show();
				}
				if(this.Mods.where({size: 'Mini'}).length > 0) {
					this.$el.find("#miniMods").show();
				}
			}
		},
		
		render: function() {
			return this;
		},
		
		addOne: function(mod) {
			var view = new ModView({model: mod});
			if(view.model.get('size') == "Classic") {
				this.$el.find('#classicModContainer').prepend(view.render().$el);
			} else {
				this.$el.find('#miniModContainer').prepend(view.render().$el);
			}
		}
	});

	var SandboxModel = Backbone.Model.extend({
		url: config.ShopPath + '/remote.php?w=getSandboxData'
	});

	var SandboxView = Backbone.View.extend({
		el: $("#sandbox"),
		
		template:_.template($('#sandbox-template').html()),
		
		initialize: function(opts) {
			opts.open = false;
			this.model = new SandboxModel(opts);
			
			_.bindAll(this, 'fetch', 'load');
			this.model.bind('change', this.changed, this);
			
			var that = this;
		},
		
		dependsOn: function(dependency) {
			this.model.bind('change', dependency, this);
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
		
		changed: function() {
			if(this.model.get('open') && typeof this.model.changedAttributes().products !== "undefined") {
				this.close();
			}
		},
		
		add: function(opts) {
			console.log("sandbox add");
			mixpanel.track("Added to Sandbox");
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

			console.log(JSON.stringify(defs.product));

			
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
						console.log(JSON.stringify(data));
						data = $.parseJSON(data);
						data.products.open = false;
						data.products.type = "sandbox";
						that.model.set(data.products);
					},
					error: function(data) {
						console.log(JSON.stringify(data));
						data = $.parseJSON(data['responseText']);
						new genericModal({
							message: data['error']
						});
					}
				}); 
			} else {
				var chooseSize = new sandboxSizeChooser(defs, false);
				$('body').append(chooseSize.render().el);
			}
		},

		buyNow: function(opts) {
			console.log("sandbox buyNow");
			mixpanel.track("Added to Cart");
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
			
			console.log(JSON.stringify(defs.product));

			if(typeof defs.product.active_variation != 'undefined') {
				var that = this;
				defs.context[defs.callback]();
				console.log("about to make ajax call");
				$.ajax({
					url: config.ShopPath + "/sandbox.php",
					data: {
						action: 'buynow',
						product_id: defs.product.id,
						variation_id: defs.product.active_variation
					},
					success: function(data) {
						data = $.parseJSON(data);
						console.log("success!");
						data.products.open = false;
						data.products.type = "sandbox";
						that.model.set(data.products);
						window.location = "/cart.php";
					},
					error: function(data) {
						console.log(JSON.stringify(data));
						
						data = $.parseJSON(data['responseText']);
						
						new genericModal({
							message: data['error']
						});
					}
				}); 
			} else {
				var chooseSize = new sandboxSizeChooser(defs, true);
				$('body').append(chooseSize.render().el);
			}
		},
		
		show: function() {
			mixpanel.track("Visualizer Opened");
			
			if(this.model.get('mods').length == 0) {
				return;
			}
			this.model.set({open: true, scroll: $(window).scrollTop()});
			$('body').append(this.render().$el);
			
			var topper = $("#sboxPreview").offset().top;
			var righter = $(document).width() - $("#sboxPreview").offset().left - $("#sboxPreview").outerWidth();
			var lefter = $("#sboxMain").offset().left;
			$("#sandbox .opened").css({
				right: righter + "px",
				top: topper + "px"
			});
			
			var totalWidth = $(document).width() - righter - lefter;
			
			this.$el.show();
			$("#sandbox .opened").animate({
				width: totalWidth + "px",
			}, 500, function() {
				$("#sboxMain").css('height', $("#sandbox .opened").height()+'px');
				$(".sboxContains").css('height', $("#sandbox .opened").height()+'px').fadeIn();
				$('#whiteDrop').bind({
					mouseenter: function() {
						window.closeTimeout = setTimeout(function() {
							window.sandbox.close();
						}, 450);
					},
					mouseleave: function() {
						window.clearTimeout(window.closeTimeout);
					}
				});
				$('.collapse').bind('click', function() { window.sandbox.close() });
				$('#clearAll').bind('click', function() { window.sandbox.empty() });
			});
			
			var that = this;
			$(document).bind('keyup',function(e) {
				that.escKey(e);
			});	
			
			stateURL = "/categories/?action="+window.shopApp.model.get('action')+"&ssid="+this.model.get('ssid');
			History.pushState({
				ssid: this.model.get('ssid'),
				action:window.shopApp.model.get('action')
			}, "Your Sandbox - Modify Watches", stateURL);
			
			$(".popshow").fancybox({
				openEffect	: 'none',
				closeEffect	: 'none',
				'width': 790,
				'height': 500,
				'autoDimensions': false
			});
		},
		
		escKey: function(e) {
			if(e.keyCode == 27) {
				this.close();
			}
		},
		
		close: function() {
			var that = this;
			$("#header").removeClass('mini');
			$("#sboxMain").css('height', 'auto');
			$("#sandbox .opened").animate(
				{
					width: 0,
				}, 
				500, 
				function() {
					that.model.set({open: false});
					$('#sandbox').remove();
				}
			);
			
			$(document).unbind('keyup');
			
			window.shopApp.setHistory();
		},
		
		render: function() {
			// Render the template
			this.$el.html(this.template(this.model.toJSON()));
			// Make sure there are pieces
			if(this.model.get('products').length != 0) {
				$(".sboxContains").hide();
				// Populate the mods
				this.mods = new ModsView(this.model.toJSON());
				this.$el.children('.opened').append(this.mods.render().$el);
				// Populate pieces
				this.contents = new SandboxContentsView(this.model.get('products'));
				this.$el.find('.sboxContains').append(this.contents.render().$el);
			} else {
				$(".sboxContains").hide();
			}
			// Add the quickcart view
			return this;
		},
		
		deleteBySid: function(sid) {
			var that = this;
			var products = this.model.get('products');
			$.each(this.model.get('products'), function(index, product) {
				if(product.sid == sid) {
					that.model.set({products: products.splice(index, 1)});
					return false;
				}
			});
		},
		
		empty: function() {
			var that = this;
			$.ajax({
				url: config.ShopPath + "/sandbox.php",
				data: {
					action: 'clear'
				},
				success: function() {
					that.model.set('products', {});
				}
			}); 
		}
	});
	
	if(typeof sandboxData != 'undefined') {
		var sandbox = new SandboxView(sandboxData);
		if(typeof window.updateShopSandbox !== "undefined") {
			sandbox.dependsOn(updateShopSandbox);
		}
		window.sandbox = sandbox;
	}
	
	$("#oSandbox").bind('click', function() {
		window.sandbox.show();
	});
	
	$('.eSubscribe').click(function() {
		var subscribeModal = new genericModal({
			message: $('#esubscribe-template').html()
		});
		
		subscribeModal.binder('click .nBut', 'destroy');
		return false;
	});
	
	
});

Array.prototype.getUnique = function(){
   var u = {}, a = [];
   for(var i = 0, l = this.length; i < l; ++i){
      if(u.hasOwnProperty(this[i])) {
         continue;
      }
      a.push(this[i]);
      u[this[i]] = 1;
   }
   return a;
}
