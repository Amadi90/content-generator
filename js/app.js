(function($){
    $(document).ready(function(){

        let app = new Vue({
            el: '#app',
            data: {
                items: $.parseJSON(content)
            },
            computed: {
                jsonContent: function () {
                    return JSON.stringify(this.items);
                }
            },
            methods: {
                addField: function () {
                    this.items.push({title: "", content: ""});
                },
                remove: function (item) {
                    this.items.splice(this.items.indexOf(item), 1);
                }
            }
        });

    });
})(jQuery);