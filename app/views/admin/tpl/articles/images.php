{% if images is defined %}
    <ul class="pages-images">
        {% for img in images %}
        <li style="background-image: url({{ getThumb(img.image) }});" data-img-id="{{ img.id }}">
            <div class="btn btn-danger right btn-xs rgth" onclick="admin.transport('delimage',{ id:{{ img.id }},table:'Imagesarticles' },admin.delImageItemById( {{ img.id }} ))">
                <span class="glyphicon glyphicon-remove"></span>
            </div>
        </li>
        {% endfor %}
    </ul>
{% endif %}