class Ajax{
    constructor(type, url, data){
        this.type = type;
        this.url = url;
        this.data = data;
    }

    request(successful, failure = function(){}){
        // create a new tag
        $.ajax({
            type: this.type,
            url: this.url,
            data: this.data,
            success: function(response){
                console.log(response);
                
                if(response.success){
                    // successful(response);
                }
                else{
                    failure();
                }
            },
            error: function (xhr) {
                console.log(xhr.responseJSON);
            }
        });
    }
}