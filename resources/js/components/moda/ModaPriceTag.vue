<script setup lang="ts">
import { computed } from 'vue';

const props = withDefaults(
    defineProps<{
        price: string | number;
        originalPrice?: string | number | null;
        size?: 'sm' | 'md' | 'lg';
    }>(),
    { size: 'md', originalPrice: null },
);

const sizes: Record<string, string> = {
    sm: 'var(--text-base)',
    md: 'var(--text-lg)',
    lg: 'var(--text-2xl)',
};

const priceStyle = computed(() => ({
    fontWeight: 'var(--weight-bold)',
    fontSize: sizes[props.size],
    color: 'var(--price)',
}));
</script>

<template>
    <span style="display: inline-flex; align-items: baseline; gap: 8px; font-family: var(--font-body)">
        <span :style="priceStyle">£{{ price }}</span>
        <span
            v-if="originalPrice"
            style="font-size: var(--text-sm); color: var(--text-muted); text-decoration: line-through"
        >
            £{{ originalPrice }}
        </span>
    </span>
</template>
