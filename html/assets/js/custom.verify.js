$.verify.addRules({
  equalsPassword: function(r) {
    return r.val() === $("[name='password']").val() ? true : "Passwords must be the same.";
  }
});
