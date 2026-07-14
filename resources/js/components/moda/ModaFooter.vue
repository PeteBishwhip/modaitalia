<script setup lang="ts">
const shopLinks = ['All posters', 'Best sellers', 'New arrivals'];
const supportLinks = ['Delivery', 'Contact', 'Returns'];
</script>

<template>
    <footer
        style="
            background: var(--ink-950);
            color: var(--text-on-inverse-muted);
            font-family: var(--font-body);
            padding: 40px 28px 24px;
        "
    >
        <div style="max-width: var(--content-max); margin: 0 auto">
            <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 32px">
                <div>
                    <img src="/images/moda/logo-white.png" alt="Moda Italia" style="height: 22px; margin-bottom: 10px" />
                    <div style="font-size: var(--text-xs); max-width: 260px; line-height: var(--leading-normal)">
                        British Beauty Meets Italian Style. Premium prints of Britain's most iconic views.
                    </div>
                </div>
                <div style="display: flex; gap: 48px">
                    <div>
                        <div
                            style="
                                font-size: var(--text-xs);
                                font-weight: var(--weight-semibold);
                                color: var(--paper-0);
                                margin-bottom: 8px;
                            "
                        >
                            Shop
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 6px; font-size: var(--text-xs)">
                            <a v-for="l in shopLinks" :key="l" href="#" style="color: inherit; text-decoration: none">{{
                                l
                            }}</a>
                        </div>
                    </div>
                    <div>
                        <div
                            style="
                                font-size: var(--text-xs);
                                font-weight: var(--weight-semibold);
                                color: var(--paper-0);
                                margin-bottom: 8px;
                            "
                        >
                            Support
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 6px; font-size: var(--text-xs)">
                            <a
                                v-for="l in supportLinks"
                                :key="l"
                                href="#"
                                style="color: inherit; text-decoration: none"
                                >{{ l }}</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; gap: 4px; margin-top: 28px">
                <div style="height: 3px; flex: 1; background: var(--it-green)"></div>
                <div style="height: 3px; flex: 1; background: var(--paper-0)"></div>
                <div style="height: 3px; flex: 1; background: var(--it-red)"></div>
            </div>
        </div>
    </footer>
</template>
