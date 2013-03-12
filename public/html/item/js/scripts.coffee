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

  ### Initialization ###

  window.core = 
    id: 1           # USE THIS INDEX FOR GET MODEL (default)
    product: 'wine' # USE THIS TYPE OF PRODUCT (default)
    setId: (id) ->
      @id = id
    setProduct: (product) ->
      @product = product
    initialize: -> # CALL THIS FUNCTION TO LOAD PAGE


      # Getting data model for Product(Wine this case)

      Item = Backbone.Model.extend
        urlRoot: "/laravel/public/API/#{core.product}"
        defaults:
          name: 'Empty title..'
          description: 'Empty description...'
          rating: 'Empty rating..'
          category: 'Empty category..'
          price: 'Empty price..'

      item = new Item id: core.id
      item.on "change", (model) ->
        $('#header h1').text(core.product) 
        $('.title').text(model.get('name'))
        $('.info .category').text(model.get('category'))
        $('.info .price').text(model.get('price')+'€')
        $('.description p').text(model.get('description'))
        $('.pic img').attr('src', "/laravel/public/img/#{core.product}s/" + model.get('picture'))
      item.fetch()

      # Getting Coments
      commentList = new CommentList()
      commentList.setItem(@.product,core.id)
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
            url: "../../API/comments/#{@.product}/1"
            data:
              name: $('#user').val()
              comment: $('textarea').val()
              rating: $('.active').text()
            success: ->
              comment = new Comment
                name: $('#user').val()
                comment: $('textarea').val()
                rating: $('.active').text()
              commentList.add(comment)
              $(textarea).val('')
        else 
          $('#footer h1').text('Elige una valoración')
  
  data = $('body').data('item')
  core.setProduct(data.product)
  core.setId(data.id)  
  core.initialize()  
