function SGPBBanner(){}
SGPBBanner.prototype.init=function(){this.callFeedbackPopup();this.closeFeedbackPopup();this.close();this.closeLicenseNotice();};SGPBBanner.prototype.closeFeedbackPopup=function()
{if(!jQuery('#sgpb-feedback-popup').length){return;}
var hideFeedbackPopup=function(){jQuery('#sgpb-feedback-popup .js-sgpb-add-spinner').addClass('sg-hide-element');jQuery('#sgpb-feedback-popup').removeClass('sgpb-show-feedback-popup');}
jQuery('#sgpb-feedback-popup .sgpb-subscriber-data-popup-close-btn-js').bind('click',function(){hideFeedbackPopup();});document.onkeydown=function(e){e=e||window.event;if(e.keyCode==27){hideFeedbackPopup();}};}
SGPBBanner.prototype.callFeedbackPopup=function()
{if(!jQuery('#sgpb-feedback-popup').length){return;}
jQuery('.sgpb-feedback-error-message').addClass('sg-hide-element');var deactivateLink=jQuery('#the-list').find('[data-slug="popup-builder"] span.deactivate a'),dialog=jQuery('#sgpb-feedback-popup'),dialogForm=jQuery('#sgpb-deactivate-feedback-dialog-form');deactivateLink.bind('click',function(e){var deactivationLink=jQuery(this).attr('href');e.preventDefault();dialog.addClass('sgpb-show-feedback-popup');jQuery('.sgpb-deactivate-feedback-dialog-input').bind('click',function(){jQuery('.sgpb-feedback-text-input').hide();jQuery(this).parent().next().find('.sgpb-feedback-text-input').show();});jQuery('.sgpb-feedback-submit-skip').click(function(){window.location.href=deactivationLink;return;});jQuery('.sgpb-feedback-submit').click(function(){if(!jQuery('.sgpb-deactivate-feedback-dialog-input').is(':checked')){jQuery('.sgpb-feedback-error-message').removeClass('sg-hide-element');return;}
var formData=dialogForm.serialize();var ajaxData={action:'sgpb_deactivate_feedback',nonce:SGPB_JS_PARAMS.nonce,beforeSend:function(){jQuery(this).attr('disabled','disabled');jQuery('.sgpb-feedback-error-message').addClass('sg-hide-element');jQuery('.js-sgpb-add-spinner').removeClass('sg-hide-element');},formData:formData};jQuery.post(SGPB_JS_PARAMS.url,ajaxData,function(res){window.location.href=deactivationLink;})});});};SGPBBanner.prototype.close=function()
{if(!jQuery('.sgpb-banner-wrapper').length){return;}
jQuery('.sgpb-info-close').click(function(){jQuery('.sgpb-banner-wrapper').remove();});};SGPBBanner.prototype.closeLicenseNotice=function()
{if(!jQuery('.sgpb-extensions-notices').length){return;}
jQuery('.sgpb-dont-show-again-license-notice').click(function(){var data={action:'sgpb_close_license_notice',nonce:SGPB_JS_PARAMS.nonce,};jQuery.post(ajaxurl,data,function(response){jQuery('.sgpb-extensions-notices').remove();});});};jQuery(document).ready(function(){var banner=new SGPBBanner();banner.init();});