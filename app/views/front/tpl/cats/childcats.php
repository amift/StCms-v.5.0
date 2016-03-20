{% if elements is empty %}
{% else %}
<ul>
    {% for element in elements %}
        <li><a href="/{{ Content.getSlugByType('cats') }}/{{ element.slug }}">{{ element.name }}</a></li>
    {% endfor %}
</ul>
{% endif %}