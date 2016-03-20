<div class="col-md-6">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Новости</h3>
            <div class="box-tools">
                <button class="btn btn-primary btn-sm" onclick="admin.transport('addnews', {}, admin.setContent)">Добавить новость</button>
            </div>
        </div>
        <div class="box-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Имя</th>
                        <th style="width: 40px">Статус</th>
                    </tr>
                </thead>
                <tbody>
                    {% for newsItem in news.items %}
                        <tr>
                            <td>{{ newsItem.id }}</td>
                            <td><a href="#" onclick="admin.transport('getnews',{ id: {{ newsItem.id }} },admin.setContent)">{{ newsItem.name }}</a></td>
                            <td>{{ statusCheck(newsItem.is_published) }}</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>

        </div>
        <div class="box-footer">
            {% if news.total_pages > 1 %}
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="/admin/news">«</a></li>
                {% if news.before != news.current %}
                    <li><a href="/admin/news?page={{ news.before }}">{{ news.before }}</a></li>
                {% endif %}
                <li class="active"><a>{{ news.current }}</a></li>
                {% if news.next != news.current %}
                    <li><a href="/admin/news?page={{ news.next }}">{{ news.next }}</a></li>
                {% endif %}
                <li><a href="/admin/news?page={{ news.last }}">»</a></li>
            </ul>
            {% endif %}
        </div>
    </div>
</div>
<div class="col-md-6 edit_page"></div>