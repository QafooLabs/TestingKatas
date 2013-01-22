# Get the aliases and functions
if [ -f ~/.bashrc ]; then
    . ~/.bashrc
fi

# Load in a the source file for the Bash Prompt colors
# This can be overwritten per user with the custom include
# See the bash_profile_custom include below
if [ -f ~/.bash_profile_colors ]; then
  . ~/.bash_profile_colors
fi

# Some useful aliases
alias grep='grep --color=always'
alias fgrep='fgrep --color=always'
alias egrep='egrep --color=always'
alias ls='ls -alh --color=always'
alias ll='ls -alh --color=always'
alias strace='strace -s 120'

# don't put duplicate lines in the history. See bash(1) for more options
# ... or force ignoredups and ignorespace
HISTCONTROL=ignoredups:ignorespace

# append to the history file, don't overwrite it
shopt -s histappend

# for setting history length see HISTSIZE and HISTFILESIZE in bash(1)
HISTSIZE=1000
HISTFILESIZE=2000

# prefix each history line with the current date+time
HISTTIMEFORMAT='%d/%b/%Y, %T '

# check the window size after each command and, if necessary,
# update the values of LINES and COLUMNS.
shopt -s checkwinsize

PATH=$PATH:$HOME/bin

export PATH
