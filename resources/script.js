
var sidebarEnhancer = {
    init: function () {
        this.cacheVars();
        this.insertSidebar();
    },

    cacheVars: function () {
        this.sidebarString = String()
            + '<div id="nav" class="system-menu">'
            + '    <span class="site-name">'
            + '        <h2>System</h2>'
            + '    </span>'
            + '    <ul>'
            + '        <li><a href="/admin/settings/general" data-icon="general"><span class="label">General</span></a></li>'
            + '        <li><a href="/admin/settings/routes" data-icon="routes"><span class="label">Routes</span></a></li>'
            + '        <li><a href="/admin/settings/email" data-icon="mail"><span class="label">Email</span></a></li>'
            + '        <li><a href="/admin/settings/plugins" data-icon="plugin"><span class="label">Plugins</span></a></li>'
            + '    </ul>'
            + '    <span class="site-name">'
            + '        <h2>Content</h2>'
            + '    </span>'
            + '    <ul>'
            + '        <li><a href="/admin/settings/fields" data-icon="field"><span class="label">Fields</span></a></li>'
            + '        <li><a href="/admin/settings/sections" data-icon="section"><span class="label">Sections</span></a></li>'
            + '        <li><a href="/admin/settings/assets" data-icon="assets"><span class="label">Assets</span></a></li>'
            + '        <li><a href="/admin/settings/globals" data-icon="globe"><span class="label">Globals</span></a></li>'
            + '        <li><a href="/admin/settings/categories" data-icon="categories"><span class="label">Categories</span></a></li>'
            + '        <li><a href="/admin/settings/tags" data-icon="tags"><span class="label">Tags</span></a></li>'
            + '    </ul>'
            + '</div>';

        this.$globalSidebarNav = document.querySelector('#global-sidebar nav');
    },

    insertSidebar: function () {
        this.$globalSidebarNav.insertAdjacentHTML('beforeend', this.sidebarString);
    }
};

// Call the initialize function
sidebarEnhancer.init();
