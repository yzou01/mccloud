$(document).ready(function () {

    // Delete field templates
    let template_delete_orders = "<input type=\"hidden\" name=\"delete_orders[]\" value=\"REPLACE_ID\">";
    let template_delete_additionalcosts = "<input type=\"hidden\" name=\"delete_additionalcosts[]\" value=\"REPLACE_ID\">";
    let delete_anchor = $('#to_be_deleted');

    //additionalCosts
    let additionalcostsContainer = $('#additionalcosts-container')
    console.log(additionalcostsContainer)
    let additionalcostsTemplate = _.template($('#additionalcosts-template').remove().text());
    let numbersRows = additionalcostsContainer.find('.additionalcosts-row').length;
    let addAdditionalCostsButton = $('#add-additionalcosts-button');

    addAdditionalCostsButton.on('click',function (e){
        e.preventDefault();
        $(additionalcostsTemplate({key: numbersRows++})).hide().appendTo(additionalcostsContainer).fadeIn('fast')
        console.log(additionalcostsTemplate[0]+"Read" )
        additionalcostsTemplate[0].scrollTop = additionalcostsContainer[0].scrollHeight

    })

    additionalcostsContainer.on('click','a.additionalcosts-delete',function (e){
        e.preventDefault();

        // Add the record id for deletion
        let item_id = $(this).closest('.additionalcosts-row').data('item-id');
        if (item_id != null) { // only delete records in the database, not the newly created ones
            let delete_HTML = template_delete_additionalcosts.replace('REPLACE_ID', item_id);
            delete_anchor.append(delete_HTML);
        }

        // Remove the row of record
        $(this).closest('.row').fadeOut('fast',function (){
            $(this).remove()
        });
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

        // Add the record id for deletion
        let order_item_id = $(this).closest('.skus-row').data('order_item_id');
        if (order_item_id != null) { // only delete records in the database, not the newly created ones
            let delete_HTML = template_delete_orders.replace('REPLACE_ID', order_item_id);
            delete_anchor.append(delete_HTML);
        }
        $(this).closest('.row').fadeOut('fast',function (){
            $(this).remove()
        })
    })
})
