$(document).ready ->

  ### Helper functions ###
  window.templateEscape = (str) ->
    str = str.replace(/&lt;/g, "<")
    str = str.replace(/&gt;/g, ">")

  ### Models ###
  Comment = Backbone.Model.extend
    defaults:
      urlRoot: '/laravel/public/API/comments'
      item: 'wines'
      name: 'Lorem'
      rating: 5
      comment: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo maiores totam animi aliquam rerum quo dicta fugit quae tenetur provident doloribus numquam iure corporis? Architecto dolores molestiae quo incidunt culpa.'

  ### Views ###

  CommentView = Backbone.View.extend
    tagName: 'article'
    template: _.template templateEscape $('#comment-template').html()
    render: ->
      attributes = @.model.toJSON()
      @.$el.html @.template attributes
      @

  ### Collection ###

  CommentList = Backbone.Collection.extend
    model: Comment
    type: 'wine'
    identifier: 1
    url: -> 
      '/laravel/public/API/comments/' + @.type + '/' + @.identifier
    setItem: (type, identifier) ->
      @.type = type
      @.identifier = identifier

  CommentListView = Backbone.View.extend
    initialize: ->
      @.collection.on('add', @.addOne, @)
      @.collection.on('reset', @.addAll, @)
  
    addOne: (comment) ->
      commentView = new CommentView({model: comment})
      # render
      commentView.render()
      # append rating
      ratingRange = [1..parseInt(comment.attributes.rating)]
      commentView.$el.find('.column-one').append('<img src="img/star.png" alt="img">') for star in ratingRange
      # Append
      @.$el.append(commentView.el)
    
    addAll: ->
      @.collection.forEach(@.addOne, @);

    render: ->
      @.addAll()
      
  
  ### Execution ###

  # Adding Coments
  commentList = new CommentList()
  commentList.setItem('wine',1)
  commentListView = new CommentListView({collection: commentList})
  commentList.fetch()
  $('#comments').append(commentListView.el)

  
