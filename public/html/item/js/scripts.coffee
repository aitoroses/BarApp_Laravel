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

  # Getting data model for wine

  Wine = Backbone.Model.extend
    urlRoot: '/laravel/public/API/wine'
    defaults:
      name: 'Empty title..'
      description: 'Empty description...'
      rating: 'Empty rating..'
      category: 'Empty category..'
      price: 'Empty price..'

  wine = new Wine id:1
  wine.on "change", (model) -> 
      $('.title').text(model.get('name'))
      $('.description p').text(model.get('description'))
  wine.fetch()




  # Getting Coments
  commentList = new CommentList()
  commentList.setItem('wine',1)
  commentListView = new CommentListView({collection: commentList})
  commentList.fetch()
  $('#comments').append(commentListView.el)

  # Comment Textarea Controller
  $.ajax
    type: 'GET'
    url: '../../API/check'
    success: (data) ->
      $('#user').val(data.username)
    error: ->
      $('#footer textarea, #footer .btn , #footer .rating').hide()
      $('#footer h1').text('Registrate para comentar')
  
  # Rating set
    $('.rating div').click ->
      $('.rating .active').removeClass('active')
      $(@).addClass('active')
  
  # Comment add
  
  $('#footer .btn').click ->
    if ($('.active').length) > 0 and $('#textarea').val().length > 0
      $.ajax
        type: 'POST'
        url: '../../API/comments/wine/1'
        data:
          name: $('#user').val()
          comment: $('textarea').val()
          rating: 2
        success: ->
          comment = new Comment
            name: $('#user').val()
            comment: $('textarea').val()
            rating: $('.active').text()
          commentList.add(comment)
          $(textarea).val('')
    else 
      $('#footer h1').text('Elige una valoración')
  
