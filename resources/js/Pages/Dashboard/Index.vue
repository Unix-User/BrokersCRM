<template>
  <div>
    <Head title="Inicio" />
    <h1 class="mb-8 text-3xl font-bold">Inicio</h1>
    <p class="mb-8 leading-normal">Olá! Bem vindo ao Broker's CRM, um aplicativo de demonstração desenhado para ajudar a ilustrar a como usar o peerjs e webrtc em video-chamadas para atividades de corretagem e apresentação de imóveis e bens imobiliários.</p>
    <!-- <img src="https://twitter.com/i/status/1589770891579097088" /> -->
    <h2 class="mb-8 text-3xl font-bold">Video-Chamadas</h2>
    <p class="mb-8 leading-normal">Selecione abaixo uma propriedade cadastrada para iniciar um tour guiado por video-chamada</p>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Proprietário</th>
          <th class="pb-4 pt-6 px-6">Corretor(a)</th>
          <th class="pb-4 pt-6 px-6">Cidade</th>
          <th class="pb-4 pt-6 px-6" colspan="2">Telefone</th>
        </tr>
        <tr v-for="contact in contacts.data" :key="contact.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-green-500" :href="`/contacts/${contact.id}/call`">
            {{ contact.name }}
            <icon v-if="contact.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/contacts/${contact.id}/call`" tabindex="-1">
            <div v-if="contact.organization">
              {{ contact.organization.name }}
            </div>
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/contacts/${contact.id}/call`" tabindex="-1">
            {{ contact.city }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/contacts/${contact.id}/call`" tabindex="-1">
            {{ contact.phone }}
            </Link>
          </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="`/contacts/${contact.id}/call`" tabindex="-1">
            <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="contacts.data.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">Nenhum registro encontrado.</td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Shared/Layout'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    contacts: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/contacts', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
