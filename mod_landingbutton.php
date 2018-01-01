<?php
	defined("_JEXEC") or die();
	
	require_once __DIR__.'/helper.php';
	




	if ($params->def('prepare_content', 1))
	{
		JPluginHelper::importPlugin('content');
		$module->content = JHtml::_('content.prepare', $module->content, '', 'mod_custom.content');
	}

	
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

	echo $params->get('prefiksID');

	require JModuleHelper::getLayoutPath('mod_custom', $params->get('layout', 'default'));


//
	//require JModuleHelper::getLayoutPath('mod_LandingButton', $params->get ('layout', 'default'));
	
//	jimport( 'joomla.application.module.helper' ); // подключаем нужный класс, один раз на странице, перед первым выводом
//	$module = "";
//	$module = JModuleHelper::getModule('mod_landingbutton'); // получаем объект модуля, mod_module - имя модуля в папке modules
//	$param = json_decode($module->params); // декодирует JSON с параметрами модуля

	$document = JFactory::getDocument();
	$document->addStyleSheet(JURI::base().'/templates/expertmusic/local/css/phonecode.css');
//$document->addStyleSheet(JURI::base().'/templates/expertmusic/local/css/callbackpages.css');
//TEST_PROD_SWISH
//$leadID = "8e318db7-43fa-420c-85d0-954b23eb210b";//test
//$leadID = "1e50ba20-2d8a-4533-824b-75c263c6cb3d";//prod
//$param->textFormaOtrasl
$modIdName = "id-name" . $params->get('prefiksID');//$param->prefiksID;
$modIdEmail = "idEmail" . $params->get('prefiksID');//$param->prefiksID;
$modIdPhone = "idPhone" . $params->get('prefiksID');//$param->prefiksID;
$modIdCompany = "idCompany" . $params->get('prefiksID');//$param->prefiksID;
$modIdIndustry = "idIndustry" . $params->get('prefiksID');//$param->prefiksID;

/*
Вывод поля компания
Вывод поля отрасль
Вывод поля телефон
Вывод поля почта
Вывод поля сфера деятельности
*/
?>
<script>var flagScript = "";</script>
<div style="height:450px;">
	<div class="your-order-container subscribe-page-customers" style="background: url() !important; paddong: 0px;padding-top:70px;">
	    <div class="your-order-container-inner">
			<div class="row">
	            <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
	                <div class="call-us-container-form bg-white ">
					<p class="text-center">
						<?php if($params->get('textNadFormoi') != 1): ?>
							Получать материалы и приглашения на следующие вебинары
						<?php endif; ?>
					</p>
	                <form id = "your-order-form" name = "your-order-form" action="" onSubmit="createObject(); return false" target = "_self" method="post">
						<input type="hidden" id ="landingID" value="<?php //echo $param->landingID; ?>">
	                	<input type="hidden" id ="em-check" name ="em-check" value="true">
		                <div class="call-us-input-error-msg">
							<?php if($params->get('textFormaFIO') != 1): ?>
								<span class = "input-error obligation">Поле обязательно к заполнению</span>	
								<span class = "input-error incorrect">Поле заполнено неверно</span>	
								<label class = "hidden" for = "<?php echo $modIdName; //call-us-input-name ?>">Ваше имя<span class="form-required">*</span></label>    
								<input type="text" class="call-us-input" id ="<?php echo $modIdName; //call-us-input-name?>" name = "<?php echo $modIdName; //call-us-input-name ?>" placeholder="ФИО">
							<?php endif; ?>
		                </div>
						 <div class="call-us-input-error-msg call-us-input-company">
						 	<?php if($params->get('textFormaCompania') != 1):?>
								<span class = "input-error obligation">Поле обязательно к заполнению</span>	
								<label class = "hidden" for = "<?php echo $modIdCompany; //call-us-input-company ?>">Название компании<span class="form-required">*</span></label>
								<input type="text" class="call-us-input" id ="<?php echo $modIdCompany; //call-us-input-company ?>" name = "<?php echo $modIdCompany; //call-us-input-company ?>" placeholder="Название компании">
							<?php endif; ?>
		                </div>
						<div class="call-us-input-country call-us-input-error-msg">
							<?php if($params->get('textFormaSferaDeyatelnosti') != 1):?>
								<span class="input-error obligation">Поле обязательно к заполнению</span>
								<span class="input-error incorrect">Поле заполнено неверно</span>
								<select class="call-us-input" id="em-ajax-category" name="call-us-container-form-category" size="0">
									<option disabled="disabled" value="0">Сфера деятельности</option>
									<option value="5382639E-D35A-4DE0-8D97-027B5692C4AD">Production</option>
									<option value="4919DFAA-BEE8-4AF9-B0BB-4F0F6B51E9F1">Магазины</option>
									<option value="1C0DFBCA-1D1E-4E52-B143-1F06B6CA8A32">Рестораны</option>
									<option value="AD04C262-6F9E-4E5F-940C-F35514E1FB46">Красота и здоровье</option>
									<option value="1D1E63D4-781F-460B-95E3-C2C3AD812370">Отели</option>
									<option selected="selected" value="92D9B546-3541-41CC-832E-0744A44B3EB5">Прочее</option>
									<option value="90C23CD9-ECB3-4130-BB61-13F1E940785A">Развлечения</option>
									<option value="4B48EDB0-7B7B-4FFB-A3B3-685ED4CAE273">Сфера услуг</option>
								</select>
								<input class="call-us-input" id="<?php echo $modIdIndustry; //categoryField ?>" name="<?php echo $modIdIndustry; //categoryField ?>" type="hidden" value="" />
							<?php endif; ?>	
						</div>
						<?php if($params->get('textFormaTelefon') != 1):?>
							<input type="text" class="call-us-input em-flags" id ="<?php echo $modIdPhone; //call-us-input-phone ?>" name = "<?php echo $modIdPhone; //call-us-input-phone ?>" placeholder="Телефон">
							<input type ="hidden" id = "em-prefics-phone-helper" name = "em-prefics-phone-helper" value="+"/>
						<?php endif; ?>
						<div class="call-us-input-error-msg">
							<?php if($params->get('textFormaMail') != 1): ?>
								<span class = "input-error obligation">Поле обязательно к заполнению</span>
								<span class = "input-error incorrect">Поле заполнено неверно</span>
								<label class = "hidden" for = "<?php echo $modIdEmail; //call-us-input-mail ?>">Адрес электронной почты<span class="form-required">*</span></label>
								<input type="text" class="call-us-input" id ="<?php echo $modIdEmail; //call-us-input-mail ?>" name = "<?php echo $modIdEmail; //call-us-input-mail ?>" placeholder="Адрес электронной почты">
							<?php endif; ?>
		                </div> 	
		                <div class="call-us-submit-button">
		                     <input type="button" onSubmit="createObject(); return false" class="btn im-btn-blue" id ="call-us-input-submit" name = "call-us-input-submit" value="<?php echo $params->get('testovoepole'); ?>">
		                </div>
	                </form>
	                </div>
	                <div class="visit-our-page em-subscribe">
	                    <p class="text-center ">Подписка успешно оформлена</p>
	                    <p class="text-center">Мы в социальных сетях</p>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://webtracking-v01.bpmonline.com/JS/track-cookies.js"></script>
<script src="https://webtracking-v01.bpmonline.com/JS/create-object.js"></script>
<script>
/**
* Замените выражение в кавычках "css-selector" в коде ниже значением селектора элемента на Вашей лендинговой странице.
* Вы можете использовать #id или любой другой CSS селектор, который будет точно определять поле ввода на Вашей лендинговой странице.
* Пример: "Email": "#MyEmailField".
* Если Ваша лендинговая страница не содержит одного или нескольких полей из приведенных ниже – оставьте строку без изменений или удалите полностью.
*/
var config = {
    fields: {
		"Name": "#<?php echo $modIdName; //call-us-input-name ?>",  // Имя посетителя, заполнившего форму
        "Email": "#<?php echo $modIdEmail; //call-us-input-mail ?>", // Email посетителя
        "MobilePhone": "#<?php echo $modIdPhone; //call-us-input-phone ?>", // Телефон посетителя
        "Company": "#<?php echo $modIdCompany; //call-us-input-company ?>", // Название компании
        "Industry": "#<?php echo $modIdIndustry; //your-order-activity-lead ?>", // Отрасль компании
    },
    landingId: "<?php echo $params->get('landingID'); //1b839c17-92aa-48a8-be92-025bdfa41e26 ?>",
    serviceUrl: "http://ind-bpm-tst-01/0/ServiceModel/GeneratedObjectWebFormService.svc/SaveWebFormObjectData",
    redirectUrl: ""
};
/**
* Функция ниже создает объект из введенных данных.
* Привяжите вызов этой функции к событию "onSubmit" формы или любому другому элементу события.
* Пример: <form class="mainForm" name="landingForm" onSubmit="createObject(); return false">
*/
function createObject() {
    landing.createObjectFromLanding(config)
}
/**
* Функция ниже инициализирует лендинг из параметров URL.
*/
function initLanding() {
    landing.initLanding(config)
}
jQuery(document).ready(initLanding)
</script>


<script>
	//Тут есть нужные мне поля
	//src='/templates/expertmusic/local/js/select-change.js'
	$(document).ready(function(){$("select").change(function(){$("select").addClass("black"),$("#<?php echo $modIdIndustry; //your-order-activity-lead ?>").val($("select").val())})});
	//src='/templates/expertmusic/local/js/validation.js'
	var submitEmCommonValidation=function(){return Lead.clear(),Lead.setFormId("your-order-form"),Lead.setLandingFieldId("landingID"),Lead.setFieldObj({fieldId:"<?php echo $modIdName; //call-us-input-name ?>",leadName:Lead.fieldName}),Lead.setFieldObj({fieldId:"<?php echo $modIdEmail; //call-us-input-mail ?>",leadName:Lead.fieldEmail}),$("*").is("#call-us-input-phone-simple")&&Lead.setFieldObj({fieldId:"call-us-input-phone-simple",leadName:Lead.fieldMobilePhone}),$("*").is("#<?php echo $modIdPhone; //call-us-input-phone ?>")&&Lead.setFieldObj({fieldId:"<?php echo $modIdPhone; //call-us-input-phone ?>",leadName:Lead.fieldMobilePhone}),$("*").is("#call-us-input-company-simple")&&Lead.setFieldObj({fieldId:"<?php echo $modIdPhone; //call-us-input-phone ?>",leadName:Lead.fieldCompany}),$("*").is("#<?php echo $modIdCompany; //call-us-input-company ?>")&&Lead.setFieldObj({fieldId:"<?php echo $modIdCompany; //call-us-input-company ?>",leadName:Lead.fieldCompany}),$("*").is("#call-us-container-form-country")&&Lead.setFieldObj({fieldId:"call-us-container-form-country"}),$("*").is("#<?php echo $modIdIndustry; //your-order-activity-lead ?>")&&Lead.setFieldObj({fieldId:"<?php echo $modIdIndustry; //your-order-activity-lead ?>",leadName:Lead.fieldIndustry}),$("*").is("#your-order-activity")&&Lead.setFieldObj({fieldId:"your-order-activity"}),$("*").is("#call-us-input-question")&&Lead.setFieldObj({fieldId:"call-us-input-question"}),$("*").is("#your-order-number")&&Lead.setFieldObj({fieldId:"your-order-number"}),$("*").is("#your-order-area")&&Lead.setFieldObj({fieldId:"your-order-area"}),$("*").is("#your-order-final-price")&&Lead.setFieldObj({fieldId:"your-order-final-price"}),$("*").is("#your-order-currency")&&Lead.setFieldObj({fieldId:"your-order-currency"}),$("*").is("#question-whom")&&Lead.setFieldObj({fieldId:"question-whom"}),$("*").is("#em-check")&&Lead.setFieldObj({fieldId:"em-check"}),Lead.submit()};$(document).ready(function(){function e(e){e.removeClass("obligation-error").removeClass("incorrect-error"),e.parent(".call-us-input-error-msg").removeClass("obligation-error").removeClass("incorrect-error")}function r(){$(".call-us-input-error-msg").removeClass("obligation-error").removeClass("incorrect-error");var e=!0,r=$("#<?php echo $modIdName; //call-us-input-name ?>");if(""==$.trim(r.val())?(r.parent().addClass("obligation-error"),e=!1):/^[A-Za-zА-Яа-яЁё\`ґєҐЄ´ІіЇї\s]+$/.test(r.val())||(r.parent().addClass("incorrect-error"),e=!1),$("*").is("#<?php echo $modIdPhone; //call-us-input-phone ?>")){var a=(i=$("#<?php echo $modIdPhone; //call-us-input-phone ?>")).val();a=(a=(a=a.replace(/\s/g,"")).replace(/\-/g,"")).replace(/^"+"/,""),""==$.trim(i.val())?(i.parent().addClass("obligation-error"),e=!1):/\d{8}$/.test(a)?a.length>17&&(i.parent().addClass("incorrect-error"),e=!1):(i.parent().addClass("incorrect-error"),e=!1)}if($("*").is("#call-us-input-phone-simple")){var i=$("#call-us-input-phone-simple"),l=i.val();l=(l=l.replace(/\s/g,"")).replace(/\-/g,""),""==$.trim(l)?(i.parent().addClass("obligation-error"),e=!1):/\d{8}$/.test(l)?l.length>17&&(i.parent().addClass("incorrect-error"),e=!1):(i.parent().addClass("incorrect-error"),e=!1)}var o=$("#<?php echo $modIdEmail; //call-us-input-mail ?>");if(""==$.trim(o.val())?(o.parent().addClass("obligation-error"),e=!1):/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/gim.test(o.val())||(o.parent().addClass("incorrect-error"),e=!1),$("*").is("#<?php echo $modIdIndustry; //your-order-activity-lead ?>")){var s=$("#<?php echo $modIdIndustry; //your-order-activity-lead ?>");""==$.trim(s.val())&&(s.parent().addClass("obligation-error"),e=!1)}if($("*").is("#<?php echo $modIdCompany; //call-us-input-company ?>")){var t=$("#<?php echo $modIdCompany; //call-us-input-company ?>");""==$.trim(t.val())&&(t.parent().addClass("obligation-error"),e=!1)}if($("*").is("#call-us-input-question")){var d=$("#call-us-input-question");""==$.trim(d.val())&&(d.parent().addClass("obligation-error"),e=!1)}return e}$("#call-us-input-submit").off().on("click",function(){var e=$(this);r()&&("undefined"!=typeof emPageFunctions&&emPageFunctions(),$(e).hasClass("em-has-loader")&&($(e).hide(0),$(e).parent().find(".em-loader").show(0)),$("#your-order-form").submit())}),$(".call-us-input-error-msg").off().on("mouseover",function(){e($(this))}),$(".em-flags").off().on("mouseover",function(){e($(this))}),$(".call-us-input-error-msg input").focus(function(){e($(this))}),$(".call-us-input-error-msg select").focus(function(){e($(this))}),$(".call-us-input-error-msg textarea").focus(function(){e($(this))}),$("#<?php echo $modIdPhone; //call-us-input-phone ?>").focus(function(){e($(this))})});
</script>

<script  src='/templates/expertmusic/jquery/js/jquery-1.11.0.min.js'></script>
<script  src='/templates/expertmusic/jquery/js/jquery-ui-1.10.4.custom.min.js'></script>
<script  src='/templates/expertmusic/local/js/counties.js'></script>

<script>
//src='/templates/expertmusic/local/js/phonecode.js'
var countryCache,countryRequesting=!1;!function(e){e.widget("custom.phonecode",{data:[],container:null,prefixField:null,searchTimeout:null,suggestTimeout:null,hideTimeout:null,options:{default_prefix:"7",prefix:"",preferCo:"росси"},_create:function(){this._loadData(),this.element.wrap('<div class="country-phone call-us-input-error-msg">');var t=this.element.parent(".country-phone"),n=e("html").attr("lang").toLocaleLowerCase(),i={required:"Required field",invalid:"This field is invalid",mask:"Number format +XX XX XXX XX XX"},o={required:"Pole wymagane",invalid:"Pole nie ważne",mask:"Format numeru +XX XX XXX XX XX"},s={required:"Поле обязательно к заполнению",invalid:"Поле заполнено неверно",mask:"Формат номера +XX XX XXX XX XX"},a={};switch(e("#you-order-final-price").addClass(n),e.trim(n)){case"ru-ru":a=s;break;case"pl-pl":a=o;break;default:a=i}var r=e('<span class = "obligation">'+a.required+'</span><span class = "incorrect">'+a.invalid+"<br/>"+a.mask+'</span><div class="country-phone-selector"><div class="country-phone-selected"></div><div class="country-phone-options"></div></div>');e(r).prependTo(t);var l=this.options.prefix?this.options.prefix:"__phone_prefix",c=e('<input id = "phone_prefix" type="hidden" name="'+l+'" value="'+this.options.default_prefix+'">');e(c).appendTo(t),this.container=t,this.prefixField=c},_loadData:function(){var t=this;countryCache||countryRequesting?countryCache?(this.data=countryCache,t._initSelector()):countryRequesting&&countryRequesting.done(function(e){t.data=e,countryCache=t.data,t._initSelector()}):countryRequesting=e.getJSON("/countries.json",{}).done(function(e){t.data=e,countryCache=t.data,t._initSelector()}).fail(function(e,n,i){t.data=countries,countryCache=t.data,t._initSelector()})},_initSelector:function(){var t=this.container.find(".country-phone-options"),n=this.container.find(".country-phone-selected"),i=null,o=this,s=e('<input type="text" class="country-phone-search" value="">');e(s).appendTo(t);var a=e('<label class="country-phone-search-label">Введите страну</label>');e(a).on("click",function(){e(this).hide(),e(s).focus()}).insertAfter(s),e(a).hide().show(),e(s).bind("keyup",function(n){o.suggestTimeout&&window.clearTimeout(o.suggestTimeout);var i=this,s=n;o.suggestTimeout=window.setTimeout(function(){var n=e(i).val().toLowerCase();if(o.suggestCountry(n),40==s.keyCode&&o._moveSuggestDown(t),38==s.keyCode&&o._moveSuggestUp(t),13==s.keyCode){var a=e(t).find(".hovered:visible");a.length&&(e(a).hasClass("country-phone-search")||(o.setElementSelected(a),o._toggleSelector())),s.stopPropagation(),s.preventDefault()}},100),""==e(this).val()?e(a).show():e(a).hide()}).bind("keypress",function(e){if(13==e.keyCode)return e.stopPropagation(),e.preventDefault(),!1});for(var r=0;r<this.data.length;r++){0==r&&(i=this.data[r]);var l=this.data[r],c=l.co,u=e('<div data-phone="'+l.ph+'" data-co="'+c.toLowerCase()+'" class="country-phone-option"><em>+'+l.ph+'<img src="/images/pages/blank.gif" class="flag flag-'+l.co+'"></em>'+l.na+"</div>");e(u).appendTo(t),this.options.preferCo&&void 0!=this.options.preferCo?c==this.options.preferCo&&(i=l):l.ph==this.options.default_prefix&&(i=l)}i&&this.container.find(".country-phone-selected").html('<img src="/images/pages/blank.gif" class="flag flag-'+i.co+'">+'+i.ph),e(n).bind("click",function(e){o._toggleSelector()}),e(t).find(".country-phone-option").bind("click",function(){o.setElementSelected(this),o._toggleSelector()}),e(t).hover(function(){o.hideTimeout&&window.clearTimeout(o.hideTimeout)},function(){var e=this;o.hideTimeout=window.setTimeout(o._mouseOverHide,1e3,e,o)}),this._initInput()},_mouseOverHide:function(t,n){if(n.container){var i=n.container.find(".country-phone-search");e(i).is(":focus")?n.hideTimeout=window.setTimeout(n._mouseOverHide,1e3,t,n):e(t).hide()}},_moveSuggestDown:function(t){var n=null,i=e(t).find(".hovered:visible");if(i.length){var o=e(i).next(":visible");o.length?n=o:(o=e(i).nextUntil(":visible").last().next()).length&&(n=o)}n||(n=e(t).find(".country-phone-option:visible").first()),n&&(e(t).find(".country-phone-option").add(".country-phone-search").removeClass("hovered"),e(n).addClass("hovered"))},_moveSuggestUp:function(t){var n=null,i=e(t).find(".hovered:visible");if(i.length){var o=e(i).prev(":visible");o.length?n=o:(o=e(i).prevUntil(":visible").last().prev()).length&&(n=o)}n||(n=e(t).find(".country-phone-option:visible").last()),n&&(e(t).find(".country-phone-option").add(".country-phone-search").removeClass("hovered"),e(n).addClass("hovered"))},suggestCountry:function(t,n){var i=this.container.find(".country-phone-options"),o=this;e(i).find(".country-phone-option").each(function(){if(t)if("россия"==t&&(t="росси"),e(this).text().toLowerCase().indexOf(t)>=0){if(e(this).show(),n&&void 0!=n){var i=e(this).data("phone");o.prefixField.val()==i&&o.setElementSelected(this)}}else n||e(this).hide();else e(this).show()})},_toggleSelector:function(){var t=this.container.find(".country-phone-options");e(t).is(":visible")?(e(t).hide("fast"),e(t).find(".country-phone-search").val("").blur(),this.element.focus(),this.suggestCountry("")):(e(t).show("fast"),window.setTimeout(function(){var n=e(t).find(".country-phone-search");e(n).val("").focus()},300))},setElementSelected:function(t){var n=this.container.find(".country-phone-selected"),i=e(t).data("phone"),o=e(t).html();o=o.split("</em>"),e(n).html(o[0]+"</em>"),this.prefixField.val(i);var s=e('input[name = "__phone_prefix"]'),a=e(s).val(),r=e(a).selector.length;return e(".em-flags").css("padding-left",5+.5*r-.5+"em"),i},_initInput:function(){var t=this;this.element.bind("keyup",function(){var n=e(this).val();if(n.length>1&&"+"==n[0]){var i=n.substring(1);t.searchTimeout&&window.clearTimeout(t.searchTimeout);var o=this;window.setTimeout(function(){var s=t.searchCountryCode(i);s&&(n=e(o).val(),n=n.replace("+"+s,""),e(o).val(n))},1e3)}}),this.initInputVal()},initInputVal:function(){var e=this.element.val(),t=this;if(e.length>1&&"+"==e[0])for(var n=6;n>=1;n--){var i=e.substring(1,n),o=t.searchCountryCode(i);if(o){e=(e=this.element.val()).replace("+"+o,""),this.element.val(e);break}}else 1==e.length&&"+"==e[0]&&this.element.val("")},searchCountryCode:function(t){var n=this.container.find(".country-phone-options"),i=t,o=this,s=!1,a=[];if(e(n).find(".country-phone-option").each(function(){i==e(this).data("phone")&&a.push({co:e(this).data("co"),el:this})}),1==a.length)s=o.setElementSelected(a[0].el);else if(a.length>1){for(var r=0;r<a.length;r++){if(!o.options.preferCo){s=o.setElementSelected(a[r].el);break}if(o.options.preferCo==a[r].co){s=o.setElementSelected(a[r].el);break}}s||(s=o.setElementSelected(a[0].el))}return s}})}(jQuery);
</script>