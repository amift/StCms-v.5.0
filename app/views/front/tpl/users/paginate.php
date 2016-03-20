{% if elements.total_pages > 1 %}
<ul>
    <li><a href="{{ Url.getCurrentPath() }}">«</a></li>
    {% if elements.before != elements.current %}
    <li><a href="{{ Url.getCurrentPath() }}?page={{ elements.before }}">{{ elements.before }}</a></li>
    {% endif %}
    <li class="active"><a>{{ elements.current }}</a></li>
    {% if elements.next != elements.current %}
    <li><a href="{{ Url.getCurrentPath() }}?page={{ elements.next }}">{{ elements.next }}</a></li>
    {% endif %}
    <li><a href="{{ Url.getCurrentPath() }}?page={{ elements.last }}">»</a></li>
</ul>
{% endif %}