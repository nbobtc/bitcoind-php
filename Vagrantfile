# -*- mode: ruby -*-
# vi: set ft=ruby :
Vagrant.configure(2) do |config|
  config.berkshelf.enabled = true
  config.vm.box = "ubuntu/trusty64"

  config.vm.define "node01" do |node01|
    node01.vm.network "private_network", ip: "192.168.33.10"
    node01.vm.network "forwarded_port", guest: 19332, host: 18332
   node01.vm.provision "chef_solo" do |chef|
      chef.add_recipe "bitcoind"
      chef.json = {
        "bitcoind" => {
          "config" => {
            "options" => {
              "regtest"     => 1,
              "gen"         => 1,
              "dnsseed"     => 0,
              "unpnp"       => 0,
              "port"        => 19000,
              "server"      => 1,
              "rpcuser"     => "username",
              "rpcpassword" => "password",
              "rpcallowip"  => ["0.0.0.0/0"],
              "rpcport"     => 19332
            }
          }
        }
      }
    end
  end

  config.vm.define "node02" do |node02|
    node02.vm.network "private_network", ip: "192.168.33.20"
    node02.vm.network "forwarded_port", guest: 19332, host: 18333
    node02.vm.provision "chef_solo" do |chef|
      chef.add_recipe "bitcoind"
      chef.json = {
        "bitcoind" => {
          "config" => {
            "options" => {
              "regtest"     => 1,
              "dnsseed"     => 0,
              "unpnp"       => 0,
              "port"        => 19000,
              "server"      => 1,
              "listen"      => 0,
              "connect"     => "192.168.33.10:19000",
              "rpcuser"     => "username",
              "rpcpassword" => "password",
              "rpcallowip"  => ["0.0.0.0/0"],
              "rpcport"     => 19332
            }
          }
        }
      }
    end
  end

end
