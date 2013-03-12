// Generated by CoffeeScript 1.6.1
(function() {

  $(document).ready(function() {
    /* Helper functions
    */

    var Comment, CommentList, CommentListView, CommentView, commentList, commentListView;
    window.templateEscape = function(str) {
      str = str.replace(/&lt;/g, "<");
      return str = str.replace(/&gt;/g, ">");
    };
    /* Models
    */

    Comment = Backbone.Model.extend({
      defaults: {
        urlRoot: '/laravel/public/API/comments',
        item: 'wines',
        name: 'Lorem',
        rating: 5,
        comment: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo maiores totam animi aliquam rerum quo dicta fugit quae tenetur provident doloribus numquam iure corporis? Architecto dolores molestiae quo incidunt culpa.'
      }
    });
    /* Views
    */

    CommentView = Backbone.View.extend({
      tagName: 'article',
      template: _.template(templateEscape($('#comment-template').html())),
      render: function() {
        var attributes;
        attributes = this.model.toJSON();
        this.$el.html(this.template(attributes));
        return this;
      }
    });
    /* Collection
    */

    CommentList = Backbone.Collection.extend({
      model: Comment,
      type: 'wine',
      identifier: 1,
      url: function() {
        return '/laravel/public/API/comments/' + this.type + '/' + this.identifier;
      },
      setItem: function(type, identifier) {
        this.type = type;
        return this.identifier = identifier;
      }
    });
    CommentListView = Backbone.View.extend({
      initialize: function() {
        this.collection.on('add', this.addOne, this);
        return this.collection.on('reset', this.addAll, this);
      },
      addOne: function(comment) {
        var commentView, ratingRange, star, _i, _j, _len, _ref, _results;
        commentView = new CommentView({
          model: comment
        });
        commentView.render();
        ratingRange = (function() {
          _results = [];
          for (var _i = 1, _ref = parseInt(comment.attributes.rating); 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--){ _results.push(_i); }
          return _results;
        }).apply(this);
        for (_j = 0, _len = ratingRange.length; _j < _len; _j++) {
          star = ratingRange[_j];
          commentView.$el.find('.column-one').append('<img src="img/star.png" alt="img">');
        }
        return this.$el.append(commentView.el);
      },
      addAll: function() {
        return this.collection.forEach(this.addOne, this);
      },
      render: function() {
        return this.addAll();
      }
    });
    /* Execution
    */

    commentList = new CommentList();
    commentList.setItem('wine', 1);
    commentListView = new CommentListView({
      collection: commentList
    });
    commentList.fetch();
    return $('#comments').append(commentListView.el);
  });

}).call(this);