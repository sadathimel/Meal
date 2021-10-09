;(function($){
    $(document).ready(function(){
        console.log('himel');
        $("#reservenow").on('click',function(){
            $.post(mealurl.ajaxurl,{
                action:'reservation',
                name:$("#name").val(),
                email:$("#email").val(),
                phone:$("#phone").val(),
                persons:$("#persons").val(),
                date:$("#date").val(),
                time:$("#time").val(),
                rn:$("#rn").val()
            },function(data){
                console.log(data);
               if('Duplicate' == data){
                   alert('You have already placed a request for this reservation. No need to submit agin');
               }else{
                   $("#paynow").attr('href',data);
                   $("#reservenow").hide();
                   $("#paynow").show();
               }
            });
            return false;
        });
        
    });
})(jQuery);