# frozen_string_literal: true
require './person'
require './contact'

class User < Person
  attr_accessor :email
  attr_accessor :mobile

  def initialize(user_name = nil, email = nil, mobile = nil)
    super user_name
    @email = email
    @mobile = mobile
    # p "User Created But Not Inserted In The DB"
  end

  def create(phone)
    file = File.open('users.txt', 'a')
    file.puts "#{name}:#{email}:#{mobile}"
  end

  def self.valid_mobile?(phone)
    !!(phone =~ /^0\d{10}$/)
  end

  def self.valid_email?(email)
    !!(email =~ /\A[\w+\-.]+@[a-z\d\-]+(\.[a-z]+)*\.[a-z]+\z/i)
  end

  def list_all
    File.open('users.txt', 'r') do |line|
      while (l = line.gets)
        puts l
      end
    end
  end

  def list_upto_line(number)
    users = []
    File.open('users.txt', 'r') do |line|
      while (l = line.gets)
        users.push(l)
      end
    end
    (0..(number - 1)).each { |i|
      puts "#{users[i]}"
    }
  end
end

loop do
  puts "What would you like to do?"
  puts "1. Create a new user"
  puts "2. List all users"
  puts "3. List a specific number of users"
  puts "0. Exit"

  choice = gets.chomp.to_i

  case choice
  when 1
    puts "Please enter your name:"
    name = gets.chomp
    user = User.new(name)

    if !user.valid_name?
      puts 'Name is not valid'
    else
      puts "Please enter your email:"
      email = gets.chomp

      user = User.new(name, email)

      if !user.email
        puts 'Email is not valid'
      else
        puts "Please enter your mobile:"
        mobile = gets.chomp
        user.mobile = mobile

        if !User.valid_mobile?(user.mobile)
          puts 'Mobile number is not valid, try again'
        else
          user.create(user.mobile)
          puts "Welcome #{user.name}"
        end
      end
    end
  when 2
    user = User.new
    user.list_all
  when 3
    user = User.new
    puts "Enter the number of users to list:"
    number = gets.chomp.to_i
    user.list_upto_line(number)
  when 0
    break
  else
    puts "Invalid choice, please try again"
  end
end
