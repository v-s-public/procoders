<button type="submit" class="btn btn-success float-right">{{ isset($model) ? 'Update' : 'Save' }}</button>
<a
    href="{{ route($routePrefix . '.index') }}"
    class="btn btn-secondary float-right back-button"
    style="margin-right: 10px"
>Cancel
</a>
