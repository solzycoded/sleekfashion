class Ajax{
    constructor(type, url, data = {}){
        this.type = type;
        this.url = url;
        this.data = data;
    }

    request(successful = function(){}, failure = function(){}, selectedTag = ""){
        $.ajax({
            type: this.type,
            url: this.url,
            data: this.data,
            success: function(response){
                if(response.success){
                    successful(response, selectedTag);
                }
                else{
                    failure(response);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseJSON);
            }
        });
    }
}