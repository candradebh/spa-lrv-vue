<template>

        <data-viewer :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
            <template scope="props">
                <tr @click="$router.push('/products/' + props.item.id)">
                    <td>{{props.item.id}}</td>
                    <td>{{props.item.category_id}}</td>
                    <td>{{props.item.name}}</td>
                    <td>{{props.item.description}}</td>
                </tr>
            </template>
        </data-viewer>

</template>
<script>
    import DataViewer from '../../components/DataViewer.vue'

    export default {
        name: 'ProductIndex',
        data() {
            return {
                title: 'Products',
                source: '/api/products',
                create: '/products/create',
                thead: [
                    {title: 'ID', key: 'id', sort: true},
                    {title: 'Category', key: 'category_id', sort: true},
                    {title: 'Name', key: 'name', sort: true},
                    {title: 'Description', key: 'description', sort: true}
                ],
                filter: [
                    'id', 'category_id', 'name', 'description'
                ]
            }
        },
        components: {
            DataViewer
        }
    }
</script>