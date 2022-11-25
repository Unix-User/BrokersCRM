<template>
  <div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/">
        <icon name="home" class="mr-2 w-4 h-4" :class="isUrl('') ? 'fill-white' : 'fill-green-400 group-hover:fill-white'" />
        <div :class="isUrl('') ? 'text-white' : 'text-green-300 group-hover:text-white'">Início</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/organizations">
        <icon name="users" class="mr-2 w-4 h-4" :class="isUrl('organizations') ? 'fill-white' : 'fill-green-400 group-hover:fill-white'" />
        <div :class="isUrl('organizations') ? 'text-white' : 'text-green-300 group-hover:text-white'">Corretores(as)</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/contacts">
        <icon name="office" class="mr-2 w-4 h-4" :class="isUrl('contacts') ? 'fill-white' : 'fill-green-400 group-hover:fill-white'" />
        <div :class="isUrl('contacts') ? 'text-white' : 'text-green-300 group-hover:text-white'">Imóveis</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/plans">
        <icon name="dashboard" class="mr-2 w-4 h-4" :class="isUrl('plans') ? 'fill-white' : 'fill-green-400 group-hover:fill-white'" />
        <div :class="isUrl('plans') ? 'text-white' : 'text-green-300 group-hover:text-white'">Planos</div>
      </Link>
    </div>
    <div class="mb-4">
      <Link class="group flex items-center py-3" href="/reports">
        <icon name="printer" class="mr-2 w-4 h-4" :class="isUrl('reports') ? 'fill-white' : 'fill-green-400 group-hover:fill-white'" />
        <div :class="isUrl('reports') ? 'text-white' : 'text-green-300 group-hover:text-white'">Relatórios</div>
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
    Link,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },
  },
}
</script>
