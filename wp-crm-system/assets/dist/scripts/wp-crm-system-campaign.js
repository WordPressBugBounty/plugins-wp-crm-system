function validateNumeric(e){return/^[+]?[1-9]\d*$/.test(e)}jQuery(document).ready((function(e){e("#publish").click((function(){var a=e('[id^="titlediv"]').find("#title"),i="",t="";e("#_wpcrm_campaign-budgetcost, #_wpcrm_campaign-budgetcost-input").each((function(){e(this).length&&(i=e(this).val())})),e("#_wpcrm_campaign-budgetcost, #_wpcrm_campaign-actualcost-input").each((function(){e(this).length&&(t=e(this).val())}));var r=0;if(a.val().length<1?(0==e("#required-title-message").length&&(e("#titlewrap").after('<label id="required-title-message">* '+wp_crm_system_campaign.i18n.error_message.title+"</label>"),e("#required-title-message").css("color","red")),r=1):e("#required-title-message").remove(),validateNumeric(i)?e("#invalid-budget-message").remove():(0==e("#invalid-budget-message").length&&(e("#_wpcrm_campaign-budgetcost").after('<label id="invalid-budget-message">* '+wp_crm_system_campaign.i18n.error_message.required+"</label>"),e("#invalid-budget-message").css("color","red")),r=1),validateNumeric(t)?e("#invalid-actual-message").remove():(0==e("#invalid-actual-message").length&&(e("#_wpcrm_campaign-actualcost").after('<label id="invalid-actual-message">* '+wp_crm_system_campaign.i18n.error_message.required+"</label>"),e("#invalid-actual-message").css("color","red")),r=1),1===r)return!1}))}));