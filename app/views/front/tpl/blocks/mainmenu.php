{% if elements is empty %}
{% else %}
    <ul>
        {% for element in elements %}
            <li><a href="/{% if element.type != 'main' %}{{ element.slug }}{% endif %}">{{ element.name }}</a></li>
        {% endfor %}
    </ul>
{% endif %}