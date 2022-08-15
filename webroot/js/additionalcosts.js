$(document).ready(function () {

    //additionalCosts
    let additionalcostsContainer = $('#additionalcosts-container')
    let additionalcostsTemplate = _.template($('#additionalcosts-template').remove().text());
    let numbersRows = additionalcostsContainer.find('.additionalcosts-row').length;
    let addAdditionalCostsButton = $('#add-additionalcosts-button');

    addAdditionalCostsButton.on('click',function (e){
        e.preventDefault();
        $(additionalcostsTemplate({key: numbersRows++})).hide().appendTo(additionalcostsContainer).fadeIn('fast')
        additionalcostsTemplate[0].scrollTop = additionalcostsContainer[0].scrollHeight
    })

    additionalcostsContainer.on('click','a.additionalcosts-delete',function (e){
        e.preventDefault();
        $(this).closest('.row').fadeOut('fast',function (){
            $(this).remove()
        })
    })

    //skus
    let skusContainer = $('#skus-container')
    let skusTemplate = _.template($('#skus-template').remove().text());
    let numbersSkuRows = skusContainer.find('.skus-row').length;
    let addSkusButton = $('#add-skus-button');

    addSkusButton.on('click',function (e){
        e.preventDefault();
        $(skusTemplate({key: numbersSkuRows++})).hide().appendTo(skusContainer).fadeIn('fast')
        skusTemplate[0].scrollTop = skusContainer[0].scrollHeight
    })

    skusContainer.on('click','a.skus-delete',function (e){
        e.preventDefault();
        $(this).closest('.row').fadeOut('fast',function (){
            $(this).remove()
        })
    })
})
