{% if elements.items is empty %}
{% else %}
<ul>
    {% for element in elements.items %}
        <li><a href="/{{ Content.getSlug() }}/{{ element.id }}">{{ element.firstname }}</a></li>
    {% endfor %}
</ul>
{{ partial( elfolder ~ '/paginate',['pagins':elements]) }}
{% endif %}