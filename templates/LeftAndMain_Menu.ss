<div class="cms-menu cms-panel cms-panel-layout west" id="cms-menu" data-layout-type="border">
    <div class="cms-logo-header north">
        <div class="cms-logo">
            <% if $SiteConfig.CustomCMSLogo %>
                <% if $SiteConfig.CustomCMSLogo.is_a('DataObject') %>
                    <div class="logo">
                        <a class="front-end-link" href="{$BaseHref}" target="_blank">{$SiteConfig.CustomCMSLogo}</a>
                    </div>
                <% else %>
                    <div class="logo">
                        <a class="front-end-link" href="{$BaseHref}" target="_blank"><img src="{$SiteConfig.CustomCMSLogo}" alt="$SiteConfig.Title CMS Logo"></a>
                    </div>
                <% end_if %>
            <% else %>
                <span><% if $SiteConfig %>$SiteConfig.Title<% else %>$ApplicationName<% end_if %></span>
            <% end_if %>
        </div>

        <div class="cms-login-status">
            <% with $CurrentMember %>
                <span>
					<% _t('LeftAndMain_Menu_ss.Hello','Hi') %>
                    <a href="{$AbsoluteBaseURL}admin/myprofile" class="profile-link">
                        <% if $FirstName && $Surname %>$FirstName $Surname<% else_if $FirstName %>$FirstName<% else %>$Email<% end_if %>
                    </a>
				</span>
            <% end_with %>
        </div>
    </div>

    <div class="cms-panel-content center">
        <ul class="cms-menu-list">
            <% loop $MainMenu %>
                <li class="$LinkingMode $FirstLast <% if $LinkingMode == 'link' %><% else %>opened<% end_if %>" id="Menu-$Code" title="$Title.ATT">
                    <a href="$Link" $AttributesHTML>
                        <span class="text">$Title</span>
                    </a>
                </li>
            <% end_loop %>
        </ul>
    </div>

    <div class="cms-panel-toggle south">
        <a class="toggle-expand" href="#"><span>&raquo;</span></a>
        <a class="toggle-collapse" href="#"><span>&laquo;</span></a>
    </div>
</div>
