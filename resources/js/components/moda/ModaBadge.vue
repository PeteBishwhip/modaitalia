<script setup lang="ts">
import { computed } from 'vue';

const props = withDefaults(
    defineProps<{
        tone?: 'neutral' | 'success' | 'danger' | 'info' | 'inverse';
    }>(),
    { tone: 'neutral' },
);

const tones: Record<string, Record<string, string>> = {
    neutral: { background: 'var(--surface-sunken)', color: 'var(--text-secondary)' },
    success: { background: 'var(--success-bg)', color: 'var(--brand-accent-strong)' },
    danger: { background: 'var(--danger-bg)', color: 'var(--danger)' },
    info: { background: 'var(--coast-blue-100)', color: 'var(--coast-blue-700)' },
    inverse: { background: 'var(--ink-950)', color: 'var(--paper-0)' },
};

const style = computed(() => ({
    display: 'inline-flex',
    alignItems: 'center',
    fontFamily: 'var(--font-body)',
    fontSize: 'var(--text-xs)',
    fontWeight: 'var(--weight-semibold)',
    letterSpacing: '0.03em',
    padding: '4px 10px',
    borderRadius: 'var(--radius-pill)',
    ...tones[props.tone],
}));
</script>

<template>
    <span :style="style"><slot /></span>
</template>
