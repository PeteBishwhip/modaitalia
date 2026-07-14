<script setup lang="ts">
import { computed, ref } from 'vue';
import ModaBadge from './ModaBadge.vue';
import ModaPriceTag from './ModaPriceTag.vue';

const props = withDefaults(
    defineProps<{
        title: string;
        place?: string;
        price: string | number;
        originalPrice?: string | number | null;
        size?: string;
        imageSrc?: string | null;
        inStock?: boolean;
        href?: string;
    }>(),
    { inStock: true, originalPrice: null, imageSrc: null },
);

const hover = ref(false);

const cardStyle = computed(() => ({
    fontFamily: 'var(--font-body)',
    background: 'var(--surface-card)',
    border: '1px solid var(--border-subtle)',
    borderRadius: 'var(--radius-md)',
    boxShadow: hover.value ? 'var(--shadow-raised)' : 'var(--shadow-card)',
    transition: 'box-shadow var(--duration-base) var(--ease-standard), transform var(--duration-base) var(--ease-standard)',
    transform: hover.value ? 'translateY(-2px)' : 'none',
    overflow: 'hidden',
    cursor: props.href ? 'pointer' : 'default',
    width: '100%',
    boxSizing: 'border-box',
    textDecoration: 'none',
    display: 'block',
}));

const imageStyle = computed(() => ({
    position: 'relative' as const,
    aspectRatio: '4 / 5',
    background: props.imageSrc
        ? `center/cover no-repeat url(${props.imageSrc})`
        : 'linear-gradient(180deg, var(--chalk), var(--coast-blue-100))',
    borderRadius: 'var(--radius-frame)',
    margin: '10px',
    boxShadow: 'var(--shadow-inset-frame)',
    display: 'flex',
    alignItems: 'flex-end',
    padding: '10px',
}));
</script>

<template>
    <component
        :is="href ? 'a' : 'div'"
        :href="href"
        :style="cardStyle"
        @mouseenter="hover = true"
        @mouseleave="hover = false"
    >
        <div :style="imageStyle">
            <span
                v-if="!imageSrc"
                style="
                    font-size: var(--text-xs);
                    color: var(--coast-blue-700);
                    background: rgba(255, 255, 255, 0.7);
                    padding: 3px 8px;
                    border-radius: 4px;
                "
            >
                {{ place ?? title }}
            </span>
            <span v-if="!inStock" style="position: absolute; margin: 6px; top: 0; left: 0">
                <ModaBadge tone="neutral">Sold out</ModaBadge>
            </span>
        </div>
        <div style="padding: 4px 14px 16px">
            <div style="font-size: var(--text-sm); font-weight: var(--weight-semibold); color: var(--text-primary)">
                {{ title }}
            </div>
            <div style="font-size: var(--text-xs); color: var(--text-muted); margin-top: 2px">{{ place }}</div>
            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 10px">
                <ModaPriceTag :price="price" :original-price="originalPrice" size="sm" />
                <ModaBadge v-if="size" tone="neutral">{{ size }}</ModaBadge>
            </div>
        </div>
    </component>
</template>
