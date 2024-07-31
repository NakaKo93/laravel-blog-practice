import $ from 'jquery';

$(function() {
    $('#blogs-get-botton').on('click', function () {
        Get('/api/blogs', BlogGetSuccess, BlogGetError);
    })

    $('#blogs-post-form').on('submit', function (event) {
        event.preventDefault();
        
        var formData = $(this).serializeArray();
        var data = {};
        for (let idx in formData) {
            var key = formData[idx].name;
            var value = formData[idx].value;
            data[key] = value;
        }
        data['published_date'] = new Date().toLocaleString('ja-JP').split('/').join('-');
        data['published_flg'] = 1;
        data['delete_flg'] = 0;

        Post('/api/blogs', data, BlogPostSuccess, BlogPostError);
    });
});

function Get (URL, SuccessFunction, ErrorFunction) {
    $.ajax({
        type : 'GET',
        url : URL,
        async : true,
        dataType : 'json',
        success : SuccessFunction,
        error : ErrorFunction
    })
}

function BlogGetSuccess (data) {
    var HtmlSegment = [];
    $.each(data['blogs'], function(index, blog) {
        HtmlSegment.push('<h2>'+blog.title+'</h2>');
        HtmlSegment.push('<h3>'+blog.explanation+'</h3>');
        HtmlSegment.push('<h5>'+blog.published_date+'</h5>');
    });
    $('#blogs-get-list').html(HtmlSegment.join(''));
}

function BlogGetError (request, error) {
    console.error(error);
    console.error(request);
}

function Post (URL, formData, SuccessFunction, ErrorFunction) {
    $.ajax({
        type : 'POST',
        url : URL,
        async : true,
        dataType : 'json',
        contentType : 'application/json',
        data : JSON.stringify(formData),
        success : SuccessFunction,
        error : ErrorFunction
    })
}

function BlogPostSuccess (data) {
    $('#blogs-success-message').text('登録に成功しました');
}

function BlogPostError (request) {
    var errors = request.responseJSON['errors'];
    if (errors['title']) {
        $('#error-title').text(errors['title']);
    }
    if (errors['explanation']) {
        $('#error-explanation').text(errors['explanation']);
    }
    if (errors['published_date']) {
        console.error(errors['published_date']);
    }
    if (errors['published_flg']) {
        console.error(errors['published_flg']);
    }
    if (errors['delete_flg']) {
        console.error(errors['delete_flg']);
    }
}

