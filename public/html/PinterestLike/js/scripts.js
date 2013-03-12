// Models
var LikeItem = Backbone.Model.extend({
	defaults: {
		urlRoot: '/laravel/public/API/likes/rap',
		name: 'Empty like...',
		description: 'Empty like...',
		picture: 'img/placeholder.jpg',
		link: 'www.defaultlink.com'
	}
});

// Views
var LikeView = Backbone.View.extend({
	tagName: 'div',
	className: 'like',
	template: _.template('\
			<div class="title"> \
				<h1><%= name %></h1> \
			</div> \
			<div class="image"> \
				<img src="<%= picture %>"> \
			</div> \
			<div class="description"> \
				<p><%= description %></p> \
			</div> \
			<div class="link"> \
				<a href="#"><%= link %></a> \
			</div>'),
	render: function(){
		var attributes = this.model.toJSON();
		this.$el.html(this.template(attributes));
		return this;
	}
});

// Collection
var LikeList = Backbone.Collection.extend({
	model: LikeItem,
	url: '/laravel/public/API/likes'
});

var LikeListView = Backbone.View.extend({
	initialize: function(){
		this.collection.on('add', this.addOne, this);
		this.collection.on('reset', this.addAll, this);
	},
	
	addOne: function(likeItem){
		var likeView = new LikeView({model: likeItem});
		this.$el.append(likeView.render().el);
	},
	addAll: function(){
		this.collection.forEach(this.addOne, this);
	},
	render: function(){
		this.addAll();
	}
});


// Execute
var likeItem = new LikeItem();

var likeView = new LikeView({ model: likeItem });

var likeList = new LikeList();

likeList.fetch();

var likeListView = new LikeListView({collection: likeList})

// Render and show
likeListView.render();

$('.like:last-child').after(likeListView.el);



