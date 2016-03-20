{% if images is empty %}
{% else %}
    <ul>
        {% for image in images %}
            <li>{{ getThumb(image.image) }}</li>
        {% endfor %}
    </ul>
{% endif %}