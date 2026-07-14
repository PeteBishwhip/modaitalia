<script setup lang="ts">
interface NavLink {
    label: string;
    href: string;
    external?: boolean;
}

withDefaults(
    defineProps<{
        links?: NavLink[];
        cartCount?: number;
    }>(),
    {
        links: () => [],
        cartCount: 0,
    },
);
</script>

<template>
    <nav
        style="
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 28px;
            background: var(--ink-950);
            font-family: var(--font-body);
        "
    >
        <a href="/" style="display: inline-flex; align-items: center">
            <img src="/images/moda/logo-white.png" alt="Moda Italia" style="height: 26px" />
        </a>
        <div style="display: flex; gap: 28px; align-items: center">
            <a
                v-for="l in links"
                :key="l.label"
                :href="l.href"
                :target="l.external ? '_blank' : undefined"
                :rel="l.external ? 'noopener' : undefined"
                style="
                    color: var(--text-on-inverse-muted);
                    font-size: var(--text-sm);
                    font-weight: var(--weight-medium);
                    text-decoration: none;
                "
                >{{ l.label }}</a
            >
        </div>
        <div style="position: relative; color: var(--paper-0); display: flex; align-items: center">
            <svg
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                <path d="M3 6h18" />
                <path d="M16 10a4 4 0 0 1-8 0" />
            </svg>
            <span
                v-if="cartCount > 0"
                style="
                    position: absolute;
                    top: -8px;
                    right: -10px;
                    background: var(--it-red);
                    color: var(--paper-0);
                    font-size: 10px;
                    font-weight: var(--weight-bold);
                    border-radius: 999px;
                    width: 16px;
                    height: 16px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                "
                >{{ cartCount }}</span
            >
        </div>
    </nav>
</template>
