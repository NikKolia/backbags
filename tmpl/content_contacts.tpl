<div id="article">
	<h2>Контакты</h2>
	<p>Мы находимся по адресу: г. Запорожье, ул. Кронштадтская, д. 2а</p>
	<p>Работаем с 09:00 до 21:00 без перерыва и выходных</p>
	<p><b>Отдел продаж:</b></p>
	<p>Телефоны: (097)990-42-90, (095)002-49-02</p>
	<p>E-mail: <a href="mailto:info@zahist.club">info@zahist.club</a></p>
	<p><b>Техническая поддержка и развитие Дилерской сети:</b></p> 
	<p>Телефоны: (097)762-21-68, (066)236-55-05</p>
	<p>"ЗАХИСТ-club" ищет партнёров для открытия филиалов и торговых представительств в других регионах Украины. Мы за честное, долговременное, плодотворное сотрудничество. Условия можно узнать по телефону или отправив письмо с пометкой в теме Партнёры. Звоните, пишите...</p>
	<!-- <p>Skype:</p>
	<p>Facebook:<a href="#" class="fbc"></a></p> -->
</div>
<div id="map" style="width:750px; height:300px"></div>
<script src="//api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
    <script src="http://yandex.st/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map("map", {
            center: [47.845914,35.095858],
            zoom: 17
        }),
        myPlacemark = new ymaps.Placemark([47.845914,35.095858], {
            // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
            balloonContentHeader: "Наш офис",
            balloonContentBody: "г.Запорожье, ул. Кронштадтская, 2а",
            balloonContentFooter: "Мы здесь!",
            hintContent: "Мы здесь!"
        });
	// элемента управления и его параметры.
    myMap.controls
        // Кнопка изменения масштаба.
        .add('zoomControl', { left: 5, top: 5 })
        // Список типов карты
        .add('typeSelector')
        // Кнопка изменения масштаба - компактный вариант.
        // Расположим её справа.
        .add('smallZoomControl', { right: 5, top: 75 })
        // Стандартный набор кнопок
        .add('mapTools', { left: 35, top: 5 });
    myMap.geoObjects.add(myPlacemark);

    // Показываем хинт на карте (без привязки к геообъекту).
    myMap.hint.show(myMap.getCenter(), "Содержимое хинта", {
        // Опция: задержка перед открытием.
        showTimeout: 1500
    });
}
</script>