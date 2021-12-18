$(document).ready(function () {

    function addData(value,level,bg,width) {
        //url for ajax request
        var url = "http://localhost/mmcovid-19/public/slient";

        $.ajax({
            url:url,
            method:'POST',
            data:{
                value:value,
                level : level,
                bg:bg,
                width:width
            },
            dataType : 'json',

            success:function(response){
                if(response.success){
                    alert(response.message) //Message come from controller
                }else{
                    alert("Error")
                }
            },
            error:function(error){
                console.log(error)
            }
        });
    }

    //Default level is 1 ,color = primary,width = 25
    // level color 1  = primary
    // level color  2 = info
    // level color  3 = warning
    // level color 4 = danger

    //dynamic level
    $('#slider1').on('input', function(event) {

        //get dynamic value from range input
        var dynamicVal = $(this).val();

        //level 2 ,color = info
        if (dynamicVal > '21' && dynamicVal < '30')
        {
            //change background color
            $('.show-line').removeClass('bg-primary');
            $('.show-line').addClass('bg-info');

            //change text  at title
            $('#level').text(2);
            //change text  in progress
            $('.show-line').text('Level : '+2 );

            //change width at progress bar
            $('.show-line').css('width','50%');

            //add data at level table
            addData(20,2,'bg-info',50)

        }else if (dynamicVal > '10' && dynamicVal < '20') {
            //change background color
            $('.show-line').addClass('bg-primary');
            $('.show-line').removeClass('bg-info');

            //change text  at title
            $('#level').text(1);
            //change text  in progress
            $('.show-line').text('Level : '+ 1);

            //change width at progress bar
            $('.show-line').css('width','25%');

            //add data at level table
            addData(10,1,'bg-primary',25)
        }

        //level 3 ,color = warning
        if(dynamicVal > '31'  && dynamicVal < '40'){
            //change background color
            $('.show-line').removeClass('bg-info');
            $('.show-line').addClass('bg-warning');

            //change text  at title
            $('#level').text(3);
            //change text  at progress bar
            $('.show-line').text('Level : '+ 3);

            //change width at progress bar
            $('.show-line').css('width','75%');

            //add data at level table
            addData(30,3,'bg-warning',75)

        }else if (dynamicVal > '21' && dynamicVal < '30') {
            //change background color
            $('.show-line').removeClass('bg-warning');
            $('.show-line').addClass('bg-info');

            //change text  at title
            $('#level').text(2);
            //change text  at progress bar
            $('.show-line').text('Level : '+2);

            //change width at progress bar
            $('.show-line').css('width','50%');

            //add data at level table
            addData(20,2,'bg-info',50)
        }

        //level 4 ,color = danger
        if(dynamicVal > '41'  && dynamicVal < '50'){
            //change background color
            $('.show-line').removeClass('bg-warning');
            $('.show-line').addClass('bg-danger');

            //change text  at title
            $('#level').text(4);
            //change text  at progress bar
            $('.show-line').text('Level : '+4);

            //change width at progress bar
            $('.show-line').css('width','100%');

            //add data at level table
            addData(40,4,'bg-danger',100)

        }else if(dynamicVal > '31'  && dynamicVal < '40') {
            //change background color
            $('.show-line').removeClass('bg-danger');
            $('.show-line').addClass('bg-warning');

            //change text  at title
            $('#level').text(3);
            //change text  at progress bar
            $('.show-line').text('Level : '+ 3);

            //change width at progress bar
            $('.show-line').css('width','75%');

            //add data at level table
            addData(30,3,'bg-warning',75)
        }

    });
});