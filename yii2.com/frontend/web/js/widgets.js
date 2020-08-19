        var DataWidget = (function() {
            var site_api = 'http://yii2.com/api';
            var page_id = document.getElementById('page_id').value;
            
            // Для выполнения ajax-запросов 
            var XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;

            // Конструктор виджета
            function Widget() {
                this.ui = {
                    updateBtn: null,
                    name: null,
                    email: null
                };
                this.init();
            }
            
            // получение данных
            Widget.prototype._getData = function(e) {
                e && e.preventDefault();

                var xhr = new XHR(),
                    name = this.ui.name,
                    email = this.ui.email,
                    data = JSON.stringify ({jsonrpc:'2.0',method:'view', params:[page_id], id:"1"} ),
                    resp;

                xhr.open('POST', site_api, true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.send(data);

                xhr.onreadystatechange = function() {
                    if (this.readyState != 4) return;
                    if (this.status != 200) {
                        console.log('Request error');
                        return;
                    }
                    resp = JSON.parse(this.responseText);
                    if(resp.result){
                        if(resp.result.name)
                            name.value = resp.result.name;
                        if(resp.result.email)
                            email.value = resp.result.email;
                    }
                }
            }
            
            // Обновление данных
            Widget.prototype._updateData = function(e) {
                e && e.preventDefault();

                var xhr = new XHR(),
                    name = this.ui.name,
                    email = this.ui.email,
                    data = 'name=' + name.value+'&email=' + email.value,
                    data = JSON.stringify ({jsonrpc:'2.0',method:'update', params:[{"page_id":page_id,"name":name.value,"email":email.value}], id:"2"} ),
                    resp;

                xhr.open('POST', site_api, true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.send(data);

                xhr.onreadystatechange = function() {
                    if (this.readyState != 4) return;
                    if (this.status != 200) {
                        console.log('Request error');
                        return;
                    }
                    resp = JSON.parse(this.responseText);
                    if(resp.result){
                        if(resp.result.name)
                            name.value = resp.result.name;
                        if(resp.result.email)
                            email.value = resp.result.email;
                    }
                }
            }

            // Инициализация компонентов ui
            Widget.prototype._initUI = function() {
                this.ui.updateBtn = document.getElementById('wbd-widget-update');
                this.ui.name = document.getElementById('name');
                this.ui.email = document.getElementById('email');
            }

            // Привязывание событий
            Widget.prototype._bindHandlers = function() {
                this.ui.updateBtn.addEventListener('click', Widget.prototype._updateData.bind(this));
            }

            // Инициализация виджета
            Widget.prototype.init = function() {
                this._initUI();
                this._bindHandlers();
                this._getData();
            }

            // Возвращаем класс виджета
            return Widget;
        })();

        new DataWidget();