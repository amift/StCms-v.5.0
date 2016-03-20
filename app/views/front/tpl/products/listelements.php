{% if elements.items is empty %}
{% else %}
<ul>
    {% for element in elements.items %}
        <li><a href="/{{ Content.getSlugByType('cats') }}/{{ Product.getSlugCat(element.cat_id) }}/{{ element.slug }}">{{ element.name }}</a></li>
    {% endfor %}
</ul>
{{ partial( elfolder ~ '/paginate',['pagins':elements]) }}
{% endif %}


