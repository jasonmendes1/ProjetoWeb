$(function(){
    $(document).on('click','.fc-day',function(){
        var date = $(this).attr('data-date');

        $.get('event/create',{'date':date},function(data){
            $('#modal').modal('show')
            .find('#modalContent')
            .html(data);
        });
    });

    $('#modalButton').click(function (){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});

$(function(){
    $('#criarExercicioButton').click(function (){
        $('#exercicio').modal('show')
            .find('#modalExercicio')
            .load($(this).attr('value'));
    });
});
