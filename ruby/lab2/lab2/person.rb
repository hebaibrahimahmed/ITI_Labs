# frozen_string_literal: true

class Person
  attr_accessor :name

  def initialize(name)
    @name = name
  end

  def valid_name?
    if /^[A-Za-z]+$/.match(name)
      true
    else
      p "Wrong Name Format"
      false
    end
  end
end
