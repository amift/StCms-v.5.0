<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Список продуктов</h3>
        <div class="box-tools">
            <button class="btn btn-primary btn-sm" onclick="admin.transport('addproduct',{cat_id: {{ id }} },admin.setContent)">Добавить товар</button>
            <button class="btn btn-primary btn-sm" onclick="admin.transport('getcatalog',{id: {{ id }} }, admin.setContent)">Назад</button>
        </div>
    </div>
    <div class="box-body">
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Наименование</th>
                    <th style="width: 40px">Статус</th>
                </tr>
            </thead>
            <tbody>
                {% for product in products %}
                <tr>
                    <td>{{ product.id }}</td>
                    <td><a href="#" onclick="admin.transport('getproduct',{ id: {{ product.id }} },admin.setContent)">{{ product.name }}</a></td>
                    <td>{{ statusCheck(product.is_published) }}</td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        
    </div>
</div>