# (MODX)EvolutionCMS.plugins.ManagerManager.mm_synch_fields

Виджет для плагина ManagerManager, позволяющий синхронизировать значения полей документа (или TV) при редактировании.
Например, чтобы заголовок и пункт меню документа были одинакомыми — особенно удобно, когда одно из полей скрыто.

Работает только с текстовыми полями (`input`, `textarea`).


## Использует

* PHP >= 5.4
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager) >= 0.4


## Документация


### Установка

Для установки распакуйте архив в `/assets/plungins/managermanager/widgets/`.


Смотрите также документацию:
* [(MODX)EvolutionCMS.plugins.ManagerManager](https://code.divandesign.biz/modx/managermanager).
* [(MODX)EvolutionCMS.modules.ddMMEditor](https://code.divandesign.biz/modx/ddmmeditor).


### Описание параметров

* `$fields`
	* Описание: Поля документа (или TV), которые необходимо синхронизировать.  
		Необходимо задать минимум 2 поля.
	* Допустимые значения: `stringCommaSeparated`
	* **Обязателен**
	
* `$roles`
	* Описание: Роли пользователей CMS, для которых необходимо применить виждет.
	* Допустимые значения:
		* `stringCommaSeparated`
		* `''` — применяется для всех ролей при пустом значении.
	* Значение по умолчанию: `''`
	
* `$roles[i]`
	* Desctription: Роль пользователя CMS.
	* Valid values: `integer`
	* **Required**
	
* `$templates`
	* Описание: ID шаблонов документов, для которых необходимо применить виджет
	* Допустимые значения:
		* `stringCommaSeparated`
		* `''` — применяется для всех шаблонов при пустом значении
	* Значение по умолчанию: `''`
	
* `$templates[i]`
	* Desctription: ID шаблона документа.
	* Valid values: `integer`
	* **Required**


### События CMS

* `OnDocFormRender`


### Примеры


#### Сделать значения этих полей всегда одинаковыми (для всех пользователей и документов)

```
mm_synch_fields('pagetitle,menutitle,longtitle');
```


## Ссылки

* [Home page](https://code.divandesign.biz/modx/mm_synch_fields)
* [Telegram chat](https://t.me/dd_code)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />