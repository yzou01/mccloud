$(document).ready(function () {
    let additionalcostsContainer = $('#additionalcosts-container')
    let additionalcostsTemplate = _.template($('#additionalcosts-template').remove().text());
    let numbersRows = additionalcostsContainer.find('.additionalcosts-row').length;
    let addAdditionalCostsButton = $('#add-additionalcosts-button');

    addAdditionalCostsButton.on('click',function (e){
        e.preventDefault();
        $(additionalcostsTemplate({key: numbersRows++})).hide().appendTo(additionalcostsContainer).fadeIn('fast')
        additionalcostsTemplate[0].scrollTop = additionalcostsContainer[0].scrollHeight
    })

    additionalcostsContainer.on('click',function (e){
        e.preventDefault();
        $(this).closest('.row').fadeOut('fast',function (){
            $(this).remove()
        })
    })
})
