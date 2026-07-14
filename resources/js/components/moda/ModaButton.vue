<script setup lang="ts">
import { computed, ref } from 'vue';

const props = withDefaults(
    defineProps<{
        variant?: 'primary' | 'secondary' | 'ghost' | 'accent';
        size?: 'sm' | 'md' | 'lg';
        disabled?: boolean;
        as?: 'button' | 'a';
        href?: string;
        target?: string;
        type?: 'button' | 'submit';
    }>(),
    {
        variant: 'primary',
        size: 'md',
        disabled: false,
        as: 'button',
        type: 'button',
    },
);

const hover = ref(false);
const active = ref(false);

const sizeStyles: Record<string, Record<string, string>> = {
    sm: { padding: '8px 14px', fontSize: 'var(--text-xs)' },
    md: { padding: '12px 22px', fontSize: 'var(--text-sm)' },
    lg: { padding: '16px 28px', fontSize: 'var(--text-md)' },
};

const variantStyles: Record<string, Record<string, string>> = {
    primary: { background: 'var(--action-primary)', color: 'var(--paper-0)', border: '1px solid var(--action-primary)' },
    secondary: { background: 'var(--paper-0)', color: 'var(--text-primary)', border: '1px solid var(--border-strong)' },
    ghost: { background: 'transparent', color: 'var(--text-primary)', border: '1px solid transparent' },
    accent: { background: 'var(--it-green)', color: 'var(--paper-0)', border: '1px solid var(--it-green)' },
};

const background = computed(() => {
    const base = variantStyles[props.variant] ?? variantStyles.primary;

    if (props.disabled) {
        return base.background;
    }

    if (props.variant === 'primary') {
        return active.value ? 'var(--action-primary-press)' : hover.value ? 'var(--action-primary-hover)' : base.background;
    }

    if ((props.variant === 'secondary' || props.variant === 'ghost') && hover.value) {
        return 'var(--surface-sunken)';
    }

    return base.background;
});

const style = computed(() => ({
    fontFamily: 'var(--font-body)',
    fontWeight: 'var(--weight-semibold)',
    letterSpacing: '0.02em',
    borderRadius: 'var(--radius-md)',
    cursor: props.disabled ? 'not-allowed' : 'pointer',
    opacity: props.disabled ? 0.45 : 1,
    transition: 'background var(--duration-base) var(--ease-standard), transform var(--duration-fast) var(--ease-standard)',
    transform: active.value && !props.disabled ? 'scale(0.98)' : 'scale(1)',
    display: 'inline-flex',
    alignItems: 'center',
    justifyContent: 'center',
    gap: '8px',
    textDecoration: 'none',
    ...sizeStyles[props.size],
    ...(variantStyles[props.variant] ?? variantStyles.primary),
    background: background.value,
}));
</script>

<template>
    <component
        :is="as"
        :href="as === 'a' ? href : undefined"
        :target="as === 'a' ? target : undefined"
        :type="as === 'button' ? type : undefined"
        :disabled="as === 'button' ? disabled : undefined"
        :style="style"
        @mouseenter="hover = true"
        @mouseleave="
            hover = false;
            active = false;
        "
        @mousedown="active = true"
        @mouseup="active = false"
    >
        <slot name="icon" />
        <slot />
    </component>
</template>
