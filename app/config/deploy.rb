#set :application, "Actual Skill"
#set :domain,      "nogetmedkode.dk"
#set :deploy_to,   "/srv/www/prod.actualskill.com"

#set :user,        "root"
#set :use_sudo,    false
#ssh_options[:port] = 22

#set :repository,  "/Users/troels.johnsen/Web/actualskill.dev"
#set :scm,         :git
#set :branch,      "master"
#set :deploy_via,  :rsync_with_remote_cache

# directories that will be shared between all deployments
#set :shared_children,     [app_path + "/logs", web_path + "/uploads", "vendor"]

# share our database configuration
#set :shared_files,      ["app/config/parameters.ini"]

#set :update_vendors, false

#role :app, 'nogetmedkode.dk'
#role :web, 'nogetmedkode.dk'


set :serverName,   "nogetmedkode.dk" # The server's hostname
set :repository,   "file:///Users/troels.johnsen/Web/actualskill.dev"

set :domain,      "prod.actualskill.com"
set :deploy_to,   "/srv/www/prod.actualskill.com" # Remote location where the project will be stored
ssh_options[:port] = 22

set :scm,         :git
set :deploy_via,  :rsync_with_remote_cache
set :user,        "root"

# Roles
role :web,        domain
role :app,        domain
role :db,         domain, :primary => true

set  :keep_releases,  3 # The number of releases which will remain on the server
set  :use_sudo,       false

# Update vendors during the deploy
set :update_vendors, true

# Set some paths to be shared between versions
set :shared_files,    ["app/config/parameters.ini"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", "vendor"]
