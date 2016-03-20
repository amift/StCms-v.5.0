{% if elements is empty %}
{% else %}
    <ul>
        {% for element in elements %}
            {% if element.type != 'main' %}
                <li><a href="/{{ element.slug }}">{{ element.name }}</a></li>
            {% endif %}
        {% endfor %}
    </ul>
{% endif %}