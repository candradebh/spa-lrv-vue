<template>

        <data-viewer :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
            <template scope="props">
                <tr @click="$router.push('/categories/' + props.item.id)">
                    <td>{{props.item.id}}</td>
                    <td>{{props.item.name}}</td>
                    <td>{{props.item.created_at}}</td>
                </tr>
            </template>
        </data-viewer>

</template>
<script>
    import DataViewer from '../../components/DataViewer.vue'

    export default {
        name: 'CategoryIndex',
        data() {
            return {
                title: 'Categories',
                source: '/api/categories',
                create: '/categories/create',
                thead: [
                    {title: 'ID', key: 'id', sort: true},
                    {title: 'Name', key: 'name', sort: true},
                    {title: 'Created At', key: 'created_at', sort: true}
                ],
                filter: [
                    'id', 'name', 'created_at'
                ]
            }
        },
        components: {
            DataViewer
        }
    }
</script>